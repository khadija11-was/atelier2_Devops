<?php
function Connect() {
    $env = parse_ini_file('.env');
    $host = $env['Serveur'];
    $user = $env['Utilisateur'];
    $pass = $env['Password'];
    $dbname = $env['db_name'];

    try {
        $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        return $connexion;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
?>
