<?php
// LES CONDITIONS TERNAIRES

// NUMBER % 10 == 0
// (CONDITION) ? 'true' : 'false';
// $number = 1;
// echo ($number % 10 == 0) ? 'true' : 'false';

// RECUPERER (S'IL EXISTE BIEN) LE PSEUDO
// CONDITION TERNAIRE POUR FAIRE CETTE VERIF
// HELLO PSEUDO
// HELLO UNKNOW USER

$pseudo = (!empty($_GET['pseudo'])) ? $_GET['pseudo'] : 'unknow user';

echo "Hello ".$pseudo;
