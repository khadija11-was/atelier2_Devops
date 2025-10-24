<?php
session_start();
require_once 'IHM/public/header.php';
require_once 'IHM/public/navbar.php';
?>

<!-- Formulaire d'authentification -->
<div class="container">
    <h2>Connexion</h2>
    <form action="gestion_Actions/login.php" method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
</div>

<?php
require_once 'IHM/public/footer.php';
?>