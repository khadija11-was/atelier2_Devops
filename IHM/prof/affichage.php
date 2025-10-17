<?php
require_once("../../Acces_BD/Professeur.php");
$professeurs = getAllProfesseurs();
?>
<h2>Liste des professeurs</h2>
<table border="1">
    <tr>
        <th>Code</th><th>Nom</th><th>Prénom</th><th>Email</th><th>Langues</th><th>Spécialité</th>
    </tr>
    <?php foreach($professeurs as $prof): ?>
    <tr>
        <td><?= $prof['code'] ?></td>
        <td><?= $prof['nom'] ?></td>
        <td><?= $prof['prenom'] ?></td>
        <td><?= $prof['email'] ?></td>
        <td><?= $prof['langues'] ?></td>
        <td><?= $prof['specialite'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
