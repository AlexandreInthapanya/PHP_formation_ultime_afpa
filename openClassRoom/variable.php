<?php
$userAge = 17; // La variable est créée et vaut 17
$userAge = 23; // La variable est modifiée et vaut 23
$userAge = 55; // La variable est modifiée et vaut 55
?>


<?php
$fullname = "alexandre inthapanya";
echo "Bonjour ";
echo $fullname;
echo " et bienvenue sur le site !";
?>

<?php
$fullname = 'Mathieu Nebra';
echo 'Bonjour ' . $fullname . ' et bienvenue sur le site !'; // OK
?>

<?php $chickenRecipesEnabled = true; ?>

<?php if ($chickenRecipesEnabled): ?> <!-- Ne pas oublier le ":" -->

<h1>Liste des recettes à base de poulet</h1>

<?php endif; ?><!-- Ni le ";" après le endif -->

<?php $chickenRecipesEnabled = true; ?>
<?php if ($chickenRecipesEnabled): ?>
<h1>Liste des recettes à base de poulet</h1>
<?php endif; ?>