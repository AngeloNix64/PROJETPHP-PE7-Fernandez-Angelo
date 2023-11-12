<?php
require_once 'classes/UserManager.php';
require_once 'classes/Utils.php';
require_once 'functions/db.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    Utils::redirect('signup.php');
}

try {
    $pdo = getConnection();
    $userManager = new UserManager($pdo);

    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmation = $_POST['confirmation'];

    // Créer une instance de UserManager et appeler la méthode registerUser
    if ($userManager->registerUser($pseudo, $email, $password, $confirmation)) {
        // Rediriger l'utilisateur vers la page d'accueil si l'inscription est réussie
        Utils::redirect('index.php');
    } else {
        // Rediriger l'utilisateur vers la page d'inscription avec un message d'erreur
        Utils::redirect('signup.php');
    }
} catch (PDOException $e) {
    $_SESSION['error_message'] = "Erreur de connexion à la base de données.";
    Utils::redirect('signup.php');
}
