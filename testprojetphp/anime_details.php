<?php
session_start();
require_once "layout/head.php";
require_once "layout/navbar.php";
require_once "functions/db.php";
?>

<style>
    .anime-details {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: left;
    }

    .anime-details img {
        margin-right: 20px; /* Espacement entre l'image et les informations */
        max-width: 50%; /* Ajuste la largeur de l'image */
        border-radius: 8px; /* Ajoute des coins arrondis à l'image */
    }

    .anime-details-info {
        max-width: 50%; /* Ajuste la largeur des informations */
    }
</style>

<?php
// Récupération de l'ID de l'anime depuis l'URL
if (isset($_GET['id'])) {
    $animeId = $_GET['id'];

    // Requête SQL pour récupérer les informations de l'anime
    $sql = "SELECT anime.*, genre.name AS genre_name
            FROM anime
            LEFT JOIN genre_anime ON anime.id = genre_anime.anime_id
            LEFT JOIN genre ON genre_anime.genre_id = genre.id
            WHERE anime.id = :animeId";

    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':animeId', $animeId, PDO::PARAM_INT);
        $stmt->execute();

        // Vérifier si l'anime existe
        if ($stmt->rowCount() > 0) {
            $anime = $stmt->fetch(PDO::FETCH_ASSOC);

            // Afficher les détails de l'anime
            echo '<br><br><br>';
            echo '<div style="border-top: 4px solid rgb(28, 185, 244);"></div>';
            echo '<div class="anime-details mx-auto p-4 bg-gray-900">';
            echo '<img src="' . htmlspecialchars($anime['cover_image_anime']) . '" alt="' . htmlspecialchars($anime['name']) . '" class="rounded-lg">';
            echo '<div class="anime-details-info text-white">';
            echo '<h2 class="text-3xl font-bold">' . htmlspecialchars($anime['name']) . '</h2>';
            echo '<p><strong>Date de sortie :</strong> ' . htmlspecialchars($anime['released_date']) . '</p>';
            echo "<p><strong>Nombre d'épisodes :</strong> " . htmlspecialchars($anime['number_of_episodes']) . '</p>';
            echo "<p><strong>Studio d'animation :</strong> " . htmlspecialchars($anime['animation_studio']) . '</p>';
            echo '<p><strong>Genres :</strong> ';
            
            $genres = [];
            do {
                $genres[] = htmlspecialchars($anime['genre_name']);
            } while ($anime = $stmt->fetch(PDO::FETCH_ASSOC));

            echo implode(', ', $genres);
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div style="border-top: 4px solid rgb(28, 185, 244);"></div>';
            echo '<br><br><br>';
        } else {
            echo "<p>Oups... Anime introuvable.</p>";
        }
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    echo "<p>Oups... Aucun ID d'anime spécifié.</p>";
}

require_once 'layout/footer.php';
?>
