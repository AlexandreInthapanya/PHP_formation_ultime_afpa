<?php
session_start(); // INITIALISE LA SESSION
session_unset(); // DESACTIVER LA SESSION
session_destroy(); // DETRUIRE LA SESSION
setcookie('log', '', time()-3444, '/', null, false, true);
header('location: connection.php'); // ACCUEIL NON CONNECTE
?>