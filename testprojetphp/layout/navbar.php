    <!-- Barre de Navigation -->
<!-- Barre de Navigation -->
<header class="border-nav bg-gray-900">
<nav class="container mx-auto sticky top-0 z-50 bg-gray-900 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="index.php" class="text-[28,185,244] text-2xl font-bold flex items-center">
                <img src="img/nekosama-small-fb-icon.png" alt="Logo Anime Sama" class="w-10 h-10 mr-2">
                <span class="neko-color">Anime&nbsp</span> <span class="text-white">Sama</span>
            </a>

            <div class="lg:hidden">
                <!-- Bouton de menu hamburger (trois tirets) -->
                <button id="menuToggle" class="text-white text-2xl">
                    <span class="block">&#9776;</span>
                </button>
            </div>
            <div id="menu" class="hidden lg:flex space-x-4">
                <a href="index.php" class="text-white hover:text-blue-400">ACCUEIL</a>
                <a href="manga.php" class="text-white hover:text-blue-400">MANGA</a>
                <a href="anime.php" class="text-white hover:text-blue-400">ANIME</a>
                <a href="#" class="text-white hover:text-blue-400">FORUM</a>
                <a href="about.php" class="text-white hover:text-blue-400">A PROPOS</a>
                <a href="#" class="text-white hover:text-blue-400">NEWSLETTER</a>
                <a href="profil.php" class="text-white hover:text-blue-400">PROFILE</a>
            </div>
            <?php
                    if (isset($_SESSION['user_id'])) {
                        // L'utilisateur est connecté, afficher l'image de profil et le bouton "Se Déconnecter"
                        echo '<div class="hidden lg:flex space-x-4">';
                        echo '<a href="profil.php" class="flex items-center decoration-solid underline text-white">' . $_SESSION['username'] . '</a>';
                        if (isset($_SESSION['profile_picture'])) {
                            echo '<a href="profil.php"><img src="' . $_SESSION['profile_picture'] . '" alt="Profile Picture" class="w-10 h-10 rounded-full"></a>'; // Affichez l'image de profil
                            echo '</div>';
                            } else {
                            echo '<a href="profil.php"><img src="uploads/no_avatar_min.png" alt="Profile Picture" class="w-10 h-10 rounded-full"></a>'; // Affichez l'image de profil
                            echo '</div>';
                        }
                    } else {
                        // L'utilisateur n'est pas connecté, afficher les boutons "S'Inscrire" et "Se Connecter"
                        echo '<div class="hidden lg:flex space-x-4">';
                        echo '<a href="signup.php" class="text-white">S\'Inscrire</a>';
                        echo '<a href="login.php" class="text-white">Se Connecter</a>';
                        echo '</div>';
                    }
            ?>
        </div>
    </nav>
</header>
<body class="bg-body bg-gray-900"></body>