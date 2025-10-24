<?php
require_once('../../Acce_BD/Etudiant.php');
$etudiants = getAllEtudiants();
?>

<h2>Liste des Étudiants</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Sexe</th>
        <th>Filière</th>
    </tr>
    <?php foreach ($etudiants as $e): ?>
        <tr>
            <td><?= $e['id'] ?></td>
            <td><?= $e['code'] ?></td>
            <td><?= $e['nom'] ?></td>
            <td><?= $e['prenom'] ?></td>
            <td><?= $e['email'] ?></td>
            <td><?= $e['sexe'] ?></td>
            <td><?= $e['filiere'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<p><a href="form.php">Ajouter un nouvel étudiant</a></p>
