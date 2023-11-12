<?php
require_once 'classes/LoginManager.php';
require_once 'classes/Utils.php';
require_once 'functions/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Utils::redirect('login.php');
}

try {
    $pdo = getConnection();
    $loginManager = new LoginManager($pdo);

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Utiliser la méthode loginUser de la classe LoginManager
    if ($loginManager->loginUser($email, $password)) {
        // Rediriger l'utilisateur vers la page d'accueil si la connexion est réussie
        Utils::redirect('index.php');
    } else {
        // Rediriger l'utilisateur vers la page de connexion avec un message d'erreur
        Utils::redirect('login.php');
    }
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Erreur de connexion à la base de données.";
    Utils::redirect('login.php');
}
