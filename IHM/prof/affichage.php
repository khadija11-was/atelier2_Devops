<?php
require_once("../../acce_BD/professeur.php");
$professeurs = getAllProfesseurs();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Professeurs</title>
    <style>
        /* ---------- Design global ---------- */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f3f6fa;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #1565c0;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        }

        header h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
        }

        main {
            flex: 1; /* pousse le footer vers le bas */
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            padding: 25px;
        }

        h2 {
            color: #1565c0;
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }

        /* ---------- Bouton Ajouter ---------- */
        .btn-ajouter {
            display: inline-block;
            background-color: #1565c0;
            color: #fff;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
            margin-bottom: 15px;
        }

        .btn-ajouter:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
        }

        /* ---------- Tableau ---------- */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background-color: #1565c0;
            color: white;
            padding: 12px;
            text-align: center;
            font-size: 15px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }

        tr:nth-child(even) {
            background-color: #f8fbff;
        }

        tr:hover {
            background-color: #e3f2fd;
        }

        /* ---------- Footer ---------- */
        footer {
            background-color: #1565c0;
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
            margin-top: auto;
        }
    </style>
</head>
<body>

<header>
    <h1>Gestion des Professeurs</h1>
</header>

<main>
    <h2>Liste des Professeurs</h2>

    <a href="form.php" class="btn-ajouter">+ Ajouter un Professeur</a>

    <table>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Langues</th>
            <th>Spécialité</th>
        </tr>

        <?php if (!empty($professeurs)): ?>
            <?php foreach($professeurs as $prof): ?>
                <tr>
                    <td><?= htmlspecialchars($prof['code']) ?></td>
                    <td><?= htmlspecialchars($prof['nom']) ?></td>
                    <td><?= htmlspecialchars($prof['prenom']) ?></td>
                    <td><?= htmlspecialchars($prof['email']) ?></td>
                    <td><?= htmlspecialchars($prof['langues']) ?></td>
                    <td><?= htmlspecialchars($prof['specialite']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6">Aucun professeur enregistré pour le moment.</td></tr>
        <?php endif; ?>
    </table>
</main>

<footer>
    © 2025 - Application Gestion École | Module Professeur
</footer>

</body>
</html>
