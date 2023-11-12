<?php
require_once "functions/db.php";
// Nouvelle requête pour récupérer 4 résultats aléatoires
$sqlRandom = "SELECT * FROM manga ORDER BY RAND() LIMIT 4";

try {
    $db = getConnection();
    $stmt = $db->prepare($sqlRandom);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $chunkedResults = array_chunk($results, 4);

        foreach ($chunkedResults as $resultGroup) {
            echo '<div class="flex justify-center">';
            foreach ($resultGroup as $row) {
                include 'result_template_manga_random.php';
            }
            echo '</div>';
        }
    } else {
        echo "<p>Oups... Aucun résultat ne correspond à la recherche.</p>";
    }
} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
}
?>
