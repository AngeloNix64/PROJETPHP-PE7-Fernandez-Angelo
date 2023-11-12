<?php session_start(); ?>

<?php 
require_once "layout/head.php";
require_once "layout/navbar.php" ;

?>

<div class="mx-auto">
    <br><br><br><?php require_once "random_quote.php" ?>
    <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
    <div class="bg-gray-900 text-white p-4 text-center">
        <div class="max-w-lg mx-auto">
            <p class="text-xl font-bold"><?= htmlspecialchars($randomQuote['quote']) ?></p>
            <p class="text-sm">— <?= htmlspecialchars($randomQuote['author']) ?>, <?= htmlspecialchars($randomQuote['work']) ?> (<?= htmlspecialchars($randomQuote['character']) ?>)</p>
        </div>
    </div>
    <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
    <br><br><br>
    <form action="manga.php" method="POST" class="my-4 bg-cover p-4 text-center">
        <div class="mx-auto max-w-sm">
            <div class="flex items-center justify-center">
                <input type="text" name="terme" placeholder="Recherche un Manga" class="p-4 rounded-l-lg bg-gray-800 text-red-400 w-3/4">
                <input type="submit" value="Rechercher" class="bg-gray-900 neko-color p-4 rounded-r-lg">
            </div>
        </div>
    </form>

    <div class="flex-auto flex-wrap justify-center">
        <?php
        if (isset($_POST['terme'])) {
            include 'recherche_manga.php';
        } else {
            echo'<div style="border-top: 4px solid rgb(28, 185, 244);"></div>';
            echo'<div class="bg-gray-900 text-white p-4 text-center mx-auto">';
            echo'<p class="text-xl font-bold">Voici une sélection Aléatoire !</p>';
            echo'</div>';
            echo'<div style="border-top: 4px solid rgb(28, 185, 244);"></div><br><br>';
            include 'random_manga_results.php';
        }
        ?>
    </div>
</div>

<br><br><br><br><br>
<?php require_once 'layout/footer.php'?>

<script src="js/main.js"></script>
</body>
</html>
