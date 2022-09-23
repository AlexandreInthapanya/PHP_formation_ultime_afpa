<?php
    //FONCTIONS EN PHP NATIVES (tableaux)

    $array = array("Jerome", "Arnold", "Alex");

    // array_flip (permuter valeur et index, fonctionne seulement à la creation d'un nouveau tableau)
    $array_two = array_flip($array);
    echo $array_two["Jerome"].'<br />';

    // array_key_exists (utile pour les conditions)
    if(array_key_exists(2, $array)) {
        echo 'YES'.'<br />';
    }

    // count (nombre d'item dans le tableau)
    echo count ($array).'<br />';

    // sort (trier dans l'ordre alphabetique les valeurs du tableau)
    sort($array);
    foreach($array as $name) {
        echo $name.'<br />';
    }


?>