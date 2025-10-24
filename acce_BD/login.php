<?php
function login($email, $password) {
    try {
        $conn = Connect();
        $stmt = $conn->prepare("SELECT * FROM etudiant WHERE email = :email AND code = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            $stmt = $conn->prepare("SELECT *, 'professeur' as role FROM professeurs WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        if ($user) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    } catch (Exception $e) {
        error_log("Erreur de connexion: " . $e->getMessage());
        return false;
    }
}

function logout() {
    session_destroy();
    header('Location: ../index.php');
    exit();
}
?>