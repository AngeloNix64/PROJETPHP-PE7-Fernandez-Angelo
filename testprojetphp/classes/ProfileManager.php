<?php
class ProfileManager
{
    private $pdo;
    private $user;

    public function __construct($pdo, $user)
    {
        $this->pdo = $pdo;
        $this->user = $user;
    }

    public function updateProfilePicture($userId, $profilePicture)
    {
        $stmt = $this->pdo->prepare('UPDATE user SET profile_picture = :profile_picture WHERE id = :user_id');
        $stmt->execute(['profile_picture' => $profilePicture, 'user_id' => $userId]);
    }
    
}
?>
