<?php
session_start(); // Bien penser à utiliser session_start, sinon $_SESSION indéfini !
$_SESSION = [];
session_destroy();
header('Location: login.php'); // Redirige vers la page de connexion
exit();
