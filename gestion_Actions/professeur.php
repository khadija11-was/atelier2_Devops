<?php
require_once("../Acce_BD/Professeur.php");

if (isset($_POST['ajouter'])) {
    $code = $_POST['code'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $langues = $_POST['langues'];
    $specialite = $_POST['specialite'];

    addProfesseur($code, $nom, $prenom, $email, $langues, $specialite);
    header("Location: ../IHM/Prof/affichage.php");
    exit();
}
?>
