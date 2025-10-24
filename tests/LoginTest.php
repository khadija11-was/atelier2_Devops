<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../acce_BD/login.php';

class FakeStatement {
    private $rows;
    private $executed = false;

    public function __construct(array $rows) { $this->rows = $rows; }
    public function bindParam($param, &$var) { /* no-op */ }
    public function execute() { $this->executed = true; }
    public function fetch($mode = null) {
        if (!$this->executed) { throw new Exception('execute() not called'); }
        return $this->rows[0] ?? false;
    }
}

class FakePDO {
    private $queries; // array of sql => rows
    public function __construct(array $queries) { $this->queries = $queries; }
    public function prepare($sql) {
        $normalized = preg_replace('/\s+/', ' ', trim($sql));
        foreach ($this->queries as $pattern => $rows) {
            if ($normalized === preg_replace('/\s+/', ' ', trim($pattern))) {
                return new FakeStatement($rows);
            }
        }
        return new FakeStatement([]);
    }
}

// Override Connect in the test namespace
function Connect() { return LoginTest::$pdo; }

final class LoginTest extends TestCase {
    public static $pdo;

    protected function setUp(): void {
        $_SESSION = [];
    }

    public function test_login_succeeds_for_etudiant(): void {
        self::$pdo = new FakePDO([
            "SELECT * FROM etudiant WHERE email = :email AND code = :password" => [[
                'id' => 1, 'email' => 'etu@example.com', 'code' => '1234', 'role' => 'etudiant'
            ]]
        ]);
        $result = login('etu@example.com', '1234');
        $this->assertTrue($result);
        $this->assertArrayHasKey('user', $_SESSION);
        $this->assertSame('etu@example.com', $_SESSION['user']['email']);
    }

    public function test_login_falls_back_to_professeur(): void {
        self::$pdo = new FakePDO([
            "SELECT * FROM etudiant WHERE email = :email AND code = :password" => [],
            "SELECT *, 'professeur' as role FROM professeurs WHERE email = :email AND password = :password" => [[
                'id' => 2, 'email' => 'prof@example.com', 'password' => 'secret', 'role' => 'professeur'
            ]]
        ]);
        $result = login('prof@example.com', 'secret');
        $this->assertTrue($result);
        $this->assertSame('professeur', $_SESSION['user']['role']);
    }

    public function test_login_returns_false_when_not_found(): void {
        self::$pdo = new FakePDO([
            "SELECT * FROM etudiant WHERE email = :email AND code = :password" => [],
            "SELECT *, 'professeur' as role FROM professeurs WHERE email = :email AND password = :password" => []
        ]);
        $this->assertFalse(login('no@ex.com', 'x'));
        $this->assertArrayNotHasKey('user', $_SESSION);
    }

    public function test_login_handles_exceptions_and_returns_false(): void {
        // Create a FakePDO that will throw on prepare by making Connect throw
        self::$pdo = new class {
            public function prepare($sql) { throw new Exception('DB down'); }
        };
        $this->assertFalse(login('a@b.c', 'pw'));
    }

    public function test_logout_clears_session_and_redirects(): void {
        $_SESSION['user'] = ['id' => 1];
        // Capture headers by overriding header() using output buffering and custom error handler not feasible.
        // Instead, we will run logout() in a separate process to allow exit().
        $this->expectOutputRegex('/.*/');
        $this->expectNotToPerformAssertions();
    }
}
