<?php
session_start();
require_once 'IHM/public/header.php';
require_once 'IHM/public/navbar.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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

        /* ---------- Formulaire ---------- */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #1565c0;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #1565c0;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            background-color: #1565c0;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0d47a1;
            transform: translateY(-2px);
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

<main>
    <h2>Connexion</h2>
    
    <!-- Formulaire d'authentification -->
    <div class="container">
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
</main>

<?php
require_once 'IHM/public/footer.php';
?>
</body>
</html>