<?php
session_start();
require_once "functions/db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = getConnection();
    $user_id = $_SESSION['user_id'];

    // Récupérer le mot de passe actuel haché de l'utilisateur depuis la base de données
    $stmt = $pdo->prepare('SELECT mdp FROM user WHERE id = :user_id');
    $stmt->execute(['user_id' => $user_id]);
    $user = $stmt->fetch();

    $current_password = $_POST['current_password'];

    // Vérifier si le mot de passe actuel correspond en utilisant password_verify
    if (password_verify($current_password, $user['mdp'])) {
        // Le mot de passe actuel est correct, vous pouvez effectuer les mises à jour ici.
        if (!empty($_POST['new_username'])) {
            // Mettre à jour le pseudo si fourni
            $new_username = $_POST['new_username'];
            $updateUsername = $pdo->prepare('UPDATE user SET pseudo = :new_username WHERE id = :user_id');
            $updateUsername->execute(['new_username' => $new_username, 'user_id' => $user_id]);
            $_SESSION['username'] = $new_username; // Mettez à jour la session
        }

        if (!empty($_POST['new_password'])) {
            // Mettre à jour le mot de passe si fourni
            $new_password = $_POST['new_password'];
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hacher le nouveau mot de passe

            $updatePassword = $pdo->prepare('UPDATE user SET mdp = :new_password WHERE id = :user_id');
            $updatePassword->execute(['new_password' => $hashed_password, 'user_id' => $user_id]);
        }

        // Redirigez l'utilisateur vers la page de profil avec un message de succès
        header("Location: profil.php?success=Profile updated successfully");
        exit();
    } else {
        // Le mot de passe actuel est incorrect, stockez le message d'erreur dans la session
        $_SESSION['error'] = "Mot de passe actuel incorrect";
        // Redirigez l'utilisateur vers la page de modification de profil
        header("Location: editProfil.php");
        exit();
    }
}

// Si la requête n'est pas de type POST, redirigez vers editProfil.php
header("Location: editProfil.php");
exit();
