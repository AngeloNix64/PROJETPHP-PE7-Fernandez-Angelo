<?php
class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCurrentUser($userId)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :user_id');
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
