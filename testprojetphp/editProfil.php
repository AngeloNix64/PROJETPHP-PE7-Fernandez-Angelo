<?php
session_start();
require_once "layout/head.php";
require_once "layout/navbar.php";
?>

<!-- Contenu principal (main) de la page editProfil -->
<main class="bg-body mx-auto p-4 text-white">
    <div class="bg-gray-900 p-10 rounded-lg max-w-lg mx-auto">
        <h1 class="text-center text-4xl font-bold"><span class="neko-color">Modifier le Profil de <?php echo $_SESSION['username']; ?></span></h1>
        <div class="mt-4">
            <!-- Affichez ici la photo de profil de l'utilisateur -->
            <?php
            if (isset($_SESSION['profile_picture'])) {
                echo '<img src="' . $_SESSION['profile_picture'] . '" alt="Profile Picture" class="bg-gray-900 rounded-full h-32 w-32 mx-auto mb-4">';
            }
            ?>
        </div>
        <!-- Formulaire pour changer la photo de profil -->
        <?php if (isset($_SESSION['error'])): ?>
            <p class="text-center text-red-500"><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <form action="editPpAction.php" method="POST" enctype="multipart/form-data">
            <label for="profile_picture" class="text-sm mt-4">Changer la photo de profil</label>
            <div class="relative mt-1 rounded-md shadow-sm">
                <label for="profile_picture" class="cursor-pointer relative block rounded-md font-medium text-[28,185,244] bg-gray-800 text-red-400 hover:bg-gray-800 hover:text-[28,100,164] focus:outline-none focus:ring focus:ring-[28,185,244] focus:ring-opacity-50 w-full px-4 py-2">
                    <span>Parcourir</span>
                    <input type="file" name="profile_picture" id="profile_picture" class="sr-only" onchange="updateFileName(this)">
                </label>
            </div>
            <span id="file-name" class="text-xs text-gray-400 mt-2"></span>
            <button type="submit" name="update" class="bg-[28,185,244] text-white px-4 py-2 rounded-md hover:bg-[28,100,164] focus:outline-none focus:ring focus:ring-[28,100,164] focus:ring-opacity-50 w-full mt-4">
                Changer de Photo de Profil
            </button>
            <?php
        // Afficher le message d'erreur s'il est présent dans la session
        if (isset($_SESSION['error'])) {
            echo '<p class="text-center text-red-500 text-sm mt-4">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']); // Effacer le message d'erreur de la session après l'avoir affiché
        }
        ?>
        </form>
        <form action="editProfilAction.php" method="POST">
            <!-- Formulaire pour mettre à jour le pseudo -->
            <label for="new_username" class="text-sm mt-4">Nouveau Pseudo</label>
            <input type="text" name="new_username" id="new_username" class="p-2 rounded bg-gray-800 text-red-400 w-full">

            <!-- Formulaire pour rentrer le nouveau mot de passe -->
            <label for="new_password" class="text-sm mt-4">Nouveau Mot de passe</label>
            <input type="password" name="new_password" id="new_password" class="p-2 rounded bg-gray-800 text-red-400 w-full">
            
            <!-- Formulaire pour rentrer le mot de passe actuel -->
            <label for="current_password" class="text-sm mt-4">Mot de passe actuel</label>
            <input type="password" name="current_password" id="current_password" class="p-2 rounded bg-gray-800 text-red-400 w-full">

            <button type="submit" name="update" class="bg-[28,185,244] text-white px-4 py-2 rounded-md hover:bg-[28,100,164] focus:outline-none focus:ring focus:ring-[28,100,164] focus:ring-opacity-50 w-full mt-4">
                Mettre à jour
            </button>
        </form>
    </div>
</main>
<?php require_once 'layout/footer.php'?>
<script src="js/main.js"></script>
<script src="js/fileName.js"></script>
</body>
</html>
