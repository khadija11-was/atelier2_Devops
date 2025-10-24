<?php
require_once('../../Acce_BD/Etudiant.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'code' => $_POST['code'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'sexe' => $_POST['sexe'],
        'filiere' => $_POST['filiere']
    ];
    ajouterEtudiant($data);
    echo "<p style='color:green;'>✅ Étudiant ajouté avec succès !</p>";
}
?>

<h2>Ajouter un Étudiant</h2>
<form method="POST">
    Code : <input type="text" name="code" required><br>
    Nom : <input type="text" name="nom" required><br>
    Prénom : <input type="text" name="prenom" required><br>
    Email : <input type="email" name="email"><br>
    Sexe :
    <select name="sexe">
        <option value="M">Masculin</option>
        <option value="F">Féminin</option>
    </select><br>
    Filière : <input type="text" name="filiere"><br>
    <button type="submit">Ajouter</button>
</form>

<p><a href="affichage.php">Voir la liste des étudiants</a></p>
