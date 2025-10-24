<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

require_once 'public/header.php';
require_once 'public/navbar.php';
?>

<div class="container">
    <h2>Tableau de Bord</h2>
    <div class="dashboard">
        <div class="card">
            <h3>Étudiants</h3>
            <p>Gérer les étudiants</p>
            <a href="Etudiant/affichage.php" class="btn">Voir les étudiants</a>
        </div>
        <div class="card">
            <h3>Professeurs</h3>
            <p>Gérer les professeurs</p>
            <a href="Prof/affichage.php" class="btn">Voir les professeurs</a>
        </div>
    </div>
</div>

<?php
require_once 'public/footer.php';
?>