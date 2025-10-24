<?php
session_start();
require_once '../Acces_BD/Login.php';

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    logout();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (login($email, $password)) {
        header('Location: ../IHM/accueil.php');
        exit();
    } else {
        header('Location: ../index.php?error=1');
        exit();
    }
}
?>