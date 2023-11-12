<?php
session_start();
require_once "layout/head.php";
require_once "layout/navbar.php";
require_once "functions/db.php";
?>

<style>
    .manga-details {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: left;
    }

    .manga-details img {
        margin-right: 20px; /* Espacement entre l'image et les informations */
        max-width: 50%; /* Ajuste la largeur de l'image */
        border-radius: 8px; /* Ajoute des coins arrondis à l'image */
    }

    .manga-details-info {
        max-width: 50%; /* Ajuste la largeur des informations */
    }
</style>

<?php
// Récupération de l'ID du manga depuis l'URL
if (isset($_GET['id'])) {
    $mangaId = $_GET['id'];

    // Requête SQL pour récupérer les informations du manga
    $sql = "SELECT manga.*, genre.name AS genre_name
            FROM manga
            LEFT JOIN genre_manga ON manga.id = genre_manga.manga_id
            LEFT JOIN genre ON genre_manga.genre_id = genre.id
            WHERE manga.id = :mangaId";

    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':mangaId', $mangaId, PDO::PARAM_INT);
        $stmt->execute();

        // Vérifier si le manga existe
        if ($stmt->rowCount() > 0) {
            $manga = $stmt->fetch(PDO::FETCH_ASSOC);

            // Afficher les détails du manga
            echo '<br><br><br>';
            echo '<div style="border-top: 4px solid rgb(28, 185, 244);"></div>';
            echo '<div class="manga-details mx-auto p-4 bg-gray-900">';
            echo '<img src="' . htmlspecialchars($manga['cover_image_volume']) . '" alt="' . htmlspecialchars($manga['name']) . '" class="rounded-lg">';
            echo '<div class="manga-details-info text-white">';
            echo '<h2 class="text-3xl font-bold">' . htmlspecialchars($manga['name']) . '</h2>';
            echo '<p><strong>Date de sortie&nbsp(Premier Volume) :</strong> ' . htmlspecialchars($manga['released_date']) . '</p>';
            echo '<p><strong>Nombre de volumes :</strong> ' . htmlspecialchars($manga['number_of_volumes']) . '</p>';
            echo '<p><strong>Auteur :</strong> ' . htmlspecialchars($manga['author']) . '</p>';
            echo '<p><strong>Genres :</strong> ';
            
            $genres = [];
            do {
                $genres[] = htmlspecialchars($manga['genre_name']);
            } while ($manga = $stmt->fetch(PDO::FETCH_ASSOC));

            echo implode(', ', $genres);
            echo '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div style="border-top: 4px solid rgb(28, 185, 244);"></div>';
            echo '<br><br><br>';
        } else {
            echo "<p>Oups... Manga introuvable.</p>";
        }
    } catch (PDOException $e) {
        echo "Erreur de base de données : " . $e->getMessage();
    }
} else {
    echo "<p>Oups... Aucun ID de manga spécifié.</p>";
}

require_once 'layout/footer.php';
?>
