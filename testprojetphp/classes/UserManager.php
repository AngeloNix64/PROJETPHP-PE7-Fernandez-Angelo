<?php

class UserManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser(string $pseudo, string $email, string $password, string $confirmation): bool
    {
        // Vérifier si un champ est vide
        if (empty($pseudo) || empty($email) || empty($password) || empty($confirmation)) {
            $_SESSION['error_message'] = "Des champs sont vides.";
            return false;
        }

        // Vérifier si le mot de passe et la confirmation correspondent
        if ($password !== $confirmation) {
            $_SESSION['error_message'] = "Les mots de passe ne correspondent pas.";
            return false;
        }

        // Vérifier si l'utilisateur existe déjà sur le site (en utilisant le pseudo et/ou l'e-mail)
        $checkIfUserAlreadyExists = $this->pdo->prepare('SELECT pseudo, email FROM user WHERE pseudo = :pseudo OR email = :email');
        $checkIfUserAlreadyExists->execute(['pseudo' => $pseudo, 'email' => $email]);

        if ($checkIfUserAlreadyExists->rowCount() == 0) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insérer l'utilisateur dans la base de données
            $insertUserOnWebsite = $this->pdo->prepare('INSERT INTO user(pseudo, email, mdp) VALUES(:pseudo, :email, :password)');
            $insertUserOnWebsite->execute(['pseudo' => $pseudo, 'email' => $email, 'password' => $hashedPassword]);

            return true;
        } else {
            $_SESSION['error_message'] = "L'utilisateur existe déjà sur le site (avec le même pseudo ou la même adresse e-mail).";
            return false;
        }
    }
}
