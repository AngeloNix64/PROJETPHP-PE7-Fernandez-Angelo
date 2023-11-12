<?php
session_start();
require_once 'functions/db.php';
require_once 'classes/Utils.php';
require_once 'classes/user.php';
require_once 'classes/ProfileManager.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = getConnection();
        $user = new User($pdo);
        $profileManager = new ProfileManager($pdo, $user);

        $userId = $_SESSION['user_id'];

        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
            $fileInfo = getimagesize($_FILES['profile_picture']['tmp_name']);
            if ($fileInfo !== false) {
                $fileType = $fileInfo['mime'];
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($_FILES['profile_picture']['name']);

                if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploadFile)) {
                    $profileManager->updateProfilePicture($userId, $uploadFile);
                    $_SESSION['profile_picture'] = $uploadFile;
                    Utils::redirect('editProfil.php?success=Photo de profil mise à jour avec succès.');
                } else {
                    $_SESSION['error'] = 'Échec du téléchargement de la photo de profil.';
                    Utils::redirect('editProfil.php');
                }
            } else {
                $_SESSION['error'] = 'Format de fichier invalide. Veuillez télécharger une image.';
                Utils::redirect('editProfil.php');
            }
        } else {
            $_SESSION['error'] = 'Aucun fichier sélectionné. Veuillez choisir une image à télécharger.';
            Utils::redirect('editProfil.php');
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Erreur de connexion à la base de données.';
        Utils::redirect('editProfil.php');
    }
} else {
    Utils::redirect('profil.php');
}
?>
