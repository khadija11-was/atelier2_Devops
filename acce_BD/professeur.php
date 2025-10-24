<?php
require_once("connexion.php");

function getAllProfesseurs() {
    $cnx = Connect();
    $req = $cnx->query("SELECT * FROM prof");
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function addProfesseur($code, $nom, $prenom, $email, $langues, $specialite) {
    $cnx = Connect();
    $sql = "INSERT INTO prof (code, nom, prenom, email, langues, specialite)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $cnx->prepare($sql);
    return $stmt->execute([$code, $nom, $prenom, $email, $langues, $specialite]);
}
?>
