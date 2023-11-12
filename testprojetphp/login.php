<?php session_start(); ?>

<?php 
require_once "layout/head.php";
require_once "layout/navbar.php" 
?>
    <br><br><br><br><br><br>
    <div style="border-top: 4px solid rgb(28, 185, 244);"></div>
    <div class="mx-auto">
        <!-- Formulaire de connexion -->
        <div class="bg-gray-900 text-white p-4 text-center">
            <div class="max-w-md mx-auto">
                <h2 class="text-2xl font-bold mb-4"><span class="neko-color">Connectez-vous à Anime Sama</span></h2>
                <?php 
                if (isset($_SESSION['error_message'])) {
                    echo '<p class="text-center text-red-500">' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']); // Effacer le message après l'avoir affiché
                }
                ?>
                <form action="loginAction.php" method="POST">

                    <div class="mb-4">
                        <label for="email" class="text-sm">Adresse Email</label>
                        <input type="email" name="email" id="email" class="p-2 rounded bg-gray-800 text-red-400 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="text-sm">Mot de passe</label>
                        <input type="password" name="password" id="password" class="p-2 rounded bg-gray-800 text-red-400 w-full">
                    </div>
                    <button type="submit" name="login" class="bg-[28,185,244] text-white p-2 rounded-lg w-full">Se Connecter</button>
                </form>
                <p class="text-sm mt-4">Nouveau sur Anime Sama ? <a href="signup.php" class="text-[28,185,244]"><span class="neko-color">Inscrivez-vous ici !</a></span></p>
            </div>
        </div>
    </div>
    <div style="border-top: 4px solid rgb(28, 185, 244);"></div>

    <br><br><br><br><br><br>
    <?php require_once 'layout/footer.php'?>
    <script src="js/main.js"></script>
</body>
</html>
