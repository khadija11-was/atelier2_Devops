<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Professeur</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f0f4f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1a73e8;
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        h1 {
            margin: 0;
            font-size: 26px;
        }

        .form-container {
            width: 50%;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            padding: 30px 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #0d47a1;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: 0.2s;
        }

        input:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 5px rgba(26,115,232,0.3);
            outline: none;
        }

        .btn {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #0d47a1;
            transform: scale(1.03);
        }

        .btn-retour {
            background-color: #5f6368;
            color: white;
            margin-left: 10px;
        }

        .btn-retour:hover {
            background-color: #3c4043;
        }
    </style>
</head>
<body>

<header>
    <h1>Ajouter un Professeur</h1>
</header>

<div class="form-container">
    <form action="../../gestion_Actions/professeur.php" method="POST">
        <label>Code :</label>
        <input type="text" name="code" required>

        <label>Nom :</label>
        <input type="text" name="nom" required>

        <label>Prénom :</label>
        <input type="text" name="prenom" required>

        <label>Email :</label>
        <input type="email" name="email" required>

        <label>Langues :</label>
        <input type="text" name="langues">

        <label>Spécialité :</label>
        <input type="text" name="specialite">

        <button type="submit" name="ajouter" class="btn">💾 Enregistrer</button>
        <a href="affichage.php" class="btn btn-retour">⬅ Retour</a>
    </form>
</div>

</body>
</html>
