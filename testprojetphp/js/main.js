
//NAVBAR en plus responsive 
document.addEventListener("DOMContentLoaded", function() {
    const menuToggle = document.getElementById("menuToggle");
    const menu = document.getElementById("menu");

    menuToggle.addEventListener("click", function() {
        menu.classList.toggle("hidden");
    });
});

$(document).ready(function () {
    // Charger des mangas aléatoires
    loadRandomMangas();

    // Fonction pour charger des mangas aléatoires
    function loadRandomMangas() {
        $.ajax({
            url: 'random_manga_results.php', // Le fichier qui renvoie les mangas aléatoires
            type: 'GET',
            success: function (data) {
                $('#manga-carousel').html(data); // Remplacer le contenu du carrousel par les mangas aléatoires
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Définir un intervalle pour recharger les mangas toutes les 5 secondes (5000 millisecondes)
    setInterval(function () {
        loadRandomMangas();
    }, 5000);
});

document.addEventListener("DOMContentLoaded", function () {
    // Sélectionnez tous les éléments avec la classe fade-in-out
    var mangaElements = document.querySelectorAll('.fade-in-out');

    // Ajoutez la classe show après 5 secondes
    setTimeout(function () {
        mangaElements.forEach(function (element) {
            element.classList.add('show');
        });
    }, 5000);
});
