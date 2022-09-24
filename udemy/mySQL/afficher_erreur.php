<?php

// AFFICHER ERREUR
    $requete = $bdd->exec('INSERT INTO users(prenom, nom, serie_preferee) 
                            VALUES("Mark", "Zuckerberg")')
                            or die(print_r($bdd->errorInfo())); 

?>