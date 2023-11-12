<?php
session_start();
require_once "layout/head.php";
require_once "layout/navbar.php";
require_once "functions/db.php";
?>

<div class="mx-auto">
    <br><br><br>
    <?php require_once "random_quote.php" ?>
    <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
    <div class="bg-gray-900 text-white p-4 text-center">
        <div class="max-w-lg mx-auto">
            <p class="text-xl font-bold"><?= htmlspecialchars($randomQuote['quote']) ?></p>
            <p class="text-sm">— <?= htmlspecialchars($randomQuote['author']) ?>, <?= htmlspecialchars($randomQuote['work']) ?> (<?= htmlspecialchars($randomQuote['character']) ?>)</p>
        </div>
    </div>
    <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
    <br><br><br><br><br>
    <form action="anime.php" method="POST" class="my-4 bg-cover p-4 text-center">
        <div class="mx-auto max-w-sm">
            <div class="flex items-center justify-center">
                <input type="text" name="terme" placeholder="Rechercher un Anime" class="p-4 rounded-l-lg bg-gray-800 text-red-400 w-3/4">
                <input type="submit" value="Rechercher" class="bg-gray-900 neko-color p-4 rounded-r-lg">
            </div>
        </div>
    </form>

    <div class="flex-auto flex-wrap justify-center">
        <?php
        if (isset($_POST['terme'])) {
            include 'recherche_anime.php';
        } else {
            $_POST['terme'] = '';
            include 'recherche_anime.php';
        }
        ?>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php require_once 'layout/footer.php'?>

<script src="js/main.js"></script>
</body>
</html>
