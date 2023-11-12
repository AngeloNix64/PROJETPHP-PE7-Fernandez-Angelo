<?php session_start(); ?>

<?php 
require_once "layout/head.php";
require_once "layout/navbar.php" 
?>

    <!-- Contenu principal (main) de la page d'accueil -->
    <br><br><br>
    <main class="mx-auto text-white">
        <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
        <div class="bg-gray-900 text-center p-10 mx-auto">
            <h1 class="text-4xl font-bold"><span class="neko-color text-center">Bienvenue sur Anime Sama</span></h1>
            <p class="text-lg mt-4">
                Découvrez un monde de manga et d'anime. Rejoignez notre communauté de passionnés et partagez votre amour pour les séries japonaises.
            </p>
            <a href="manga.php" class="bg-[28,185,244] text-white px-4 py-2 rounded-full mt-4 inline-block">Découvrir les Mangas</a>
            <a href="anime.php" class="bg-[28,185,244] text-white px-4 py-2 rounded-full mt-4 inline-block">Découvrir les Animes</a>
        </div>
        <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
        <br><br><br><br>
        <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
        <div class="bg-gray-900 text-center p-10 mx-auto">
            <h1 class="text-4xl font-bold"><span class="neko-color text-center">Découvrez nos mangas</span></h1> <br>
            <!-- Carrousel de mangas -->
            <div id="manga-carousel" class="flex justify-center">
            <!-- Le contenu du carrousel sera chargé dynamiquement ici -->
            </div>
        </div>
        <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
        <br><br><br><br><br><br><br><br><br><br>
    </main>

    <?php require_once 'layout/footer.php'?>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>
