<?php
require_once 'connexion.php';

function getAllEtudiants() {
    $pdo = Connect();
    $sql = "SELECT * FROM Etudiant ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function ajouterEtudiant($data) {
    $pdo = Connect();
    $sql = "INSERT INTO Etudiant (code, nom, prenom, email, sexe, filiere)
            VALUES (:code, :nom, :prenom, :email, :sexe, :filiere)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
}
?>
