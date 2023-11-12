<?php

class LoginManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function loginUser(string $email, string $password): bool
    {
        // Vérifier si un champ est vide
        if (empty($email) || empty($password)) {
            $_SESSION['error_message'] = "Des champs sont vides.";
            return false;
        }

        // Rechercher l'utilisateur dans la base de données en fonction de l'adresse e-mail
        $getUserByEmail = $this->pdo->prepare('SELECT id, email, mdp FROM user WHERE email = :email');
        $getUserByEmail->execute(['email' => $email]);

        if ($getUserByEmail->rowCount() > 0) {
            $user = $getUserByEmail->fetch();
            $hashedPassword = $user['mdp'];

            if (password_verify($password, $hashedPassword)) {
                // Connexion réussie
                // Récupérez toutes les données de l'utilisateur à partir de la base de données
                $getUserDataQuery = $this->pdo->prepare('SELECT * FROM user WHERE id = :user_id');
                $getUserDataQuery->execute(['user_id' => $user['id']]);
                $userData = $getUserDataQuery->fetch();

                // Stockez toutes les données de l'utilisateur dans la session
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['username'] = $userData['pseudo'];
                $_SESSION['user_email'] = $userData['email'];
                $_SESSION['profile_picture'] = $userData['profile_picture'];

                return true;
            } else {
                $_SESSION['error_message'] = "Mot de passe incorrect.";
                return false;
            }
        } else {
            $_SESSION['error_message'] = "Aucun utilisateur trouvé avec cette adresse e-mail.";
            return false;
        }
    }
}
