<?php
require_once "functions/db.php";

// Récupération du terme de recherche depuis le formulaire
if (isset($_POST['terme'])) {
    $terme = htmlspecialchars($_POST['terme'], ENT_QUOTES, 'UTF-8');

    // Requête SQL pour rechercher dans la base de données (table "manga")
    $sql = "SELECT id, name, YEAR(released_date) AS release_year, cover_image_volume
            FROM manga
            WHERE name LIKE :terme";

    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':terme', "%$terme%", PDO::PARAM_STR);
        $stmt->execute();

        // Affichage des résultats en utilisant le modèle
        if ($stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $chunkedResults = array_chunk($results, 4); // Divisez les résultats en groupes de 4

            foreach ($chunkedResults as $resultGroup) {
                echo '<div class="flex justify-center">';
                foreach ($resultGroup as $row) {
                    include 'result_template_manga_random.php'; // Inclure le modèle pour chaque résultat
                }
                echo '</div>';
            }
        } else {
            echo'<div style="border-top: 4px solid rgb(28, 185, 244);"></div>';
            echo'<div class="bg-gray-900 text-white p-4 text-center mx-auto">';
            echo'<p class="text-xl font-bold">Oups... Aucun résultat ne correspond à la recherche.</p>';
            echo'</div>';
            echo'<div style="border-top: 4px solid rgb(28, 185, 244);"></div><br><br>';
        }
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
}
?>
