<?php
session_start();
require_once "layout/head.php";
require_once "layout/navbar.php";
require_once "classes/Utils.php";

if (!isset($_SESSION['user_id'])){
    Utils::redirect('login.php');
}
?>

<main class="bg-body mx-auto p-4 text-white">
    <div class="bg-gray-900 p-10 rounded-lg max-w-lg mx-auto">
        <h1 class="text-center text-4xl font-bold"><span class="neko-color">Profil de <?php echo $_SESSION['username']; ?></span></h1>
        <div class="mt-4">
            <!-- Affichez ici la photo de profil de l'utilisateur -->
            <?php
            if (isset($_SESSION['profile_picture'])) {
                echo '<img src="' . $_SESSION['profile_picture'] . '" alt="Profile Picture" class="bg-gray-900 rounded-full h-32 w-32 mx-auto mb-4">';
            }
            ?>
        </div>
        <p class="text-lg">
            <!-- Utilisez $_SESSION pour afficher les détails du profil de l'utilisateur -->
            Pseudo : <?php echo $_SESSION['username']; ?><br>
            Adresse Email : <?php echo $_SESSION['user_email']; ?>
        </p>
        <!-- Bouton pour modifier le profil -->
        <a href="editProfil.php" class="bg-[28,185,244] text-white px-4 py-2 rounded-md hover:bg-[28,100,164] focus:outline-none focus:ring focus:ring-[28,100,164] focus:ring-opacity-50 block w-full mt-4 text-center">
            Modifier le Profil
        </a>
        <a href="logout.php" class="bg-[28,185,244] text-white px-4 py-2 rounded-md hover:bg-[28,100,164] focus:outline-none focus:ring focus:ring-[28,100,164] focus:ring-opacity-50 block w-full mt-4 text-center">
            Déconnexion
        </a>
    </div>
</main>
<?php require_once 'layout/footer.php'?>
<script src="js/main.js"></script>
</body>
</html>
