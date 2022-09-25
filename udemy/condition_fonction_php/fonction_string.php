<?php
    //FONCTIONS EN PHP NATIVES      

    $string = "Bienvenue sur la formation ultime en PHP et MySQL";

    // STRLEN affiche le nombre de caractere
    echo 'Nombre de caracteres : '.strlen($string).'<br />';
    
    // STR_REPLACE 
    echo 'La string transformée : '.str_replace('Bienvenue','Welcome',$string).'<br />';

    // STRTOLOWER minuscule
    echo strtolower($string).'<br />';

    // STRTOUPPER MAJ
    echo strtoupper($string).'<br />';

    // SUBSTR prend les 25 premiers caracteres
    echo substr($string, 0, 25);
?>
