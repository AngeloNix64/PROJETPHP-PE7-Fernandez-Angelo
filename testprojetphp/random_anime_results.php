<?php
require_once "functions/db.php";

function getRandomResults($table, $limit = 4)
{
    $sql = "SELECT * FROM $table ORDER BY RAND() LIMIT :limit";
    
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
        return [];
    }
}
?>
