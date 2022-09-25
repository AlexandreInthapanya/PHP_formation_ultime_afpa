<!-- 

CONNECT / OPERATIONS (LIRE / ECRIRE / MODIFIER / SUPPRIMER) 

mysql_ => mySQL, vieilles, =/= (extension obsolete)
mysqli_ => mySQL, améliorées, ~
PDO => trés sécurisée, mySQL, Oracle, PostgreSQL, +++++

/Applications/MAMP/conf/PHP7XXX/php.ini

;extension=php_pdo_firebird.dll
;extension=php_pdo_mssql.dll
extension=php_pdo_mysql.dll
;extension=php_pdo_oci.dll
;extension=php_pdo_odbc.dll

-->
<?php 
    // Connexion BDD 
    /* try {} catch(Exception $e) {} (structure try catch) Afficher Erreur dans catch quand traitement erroné*/
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=formation_users;charset=utf8', 'root', 'prout');
    } catch(Exception $e) {
        die('Erreur : '. $e->getMessage());
    }

    // REQUETE POST
    // AJOUTE UN NOUVEL UTILISATEUR
    if(isset($_GET['prenom']) && isset($_GET['nom']) && isset($_GET['serie'])){

        $prenom = $_GET['prenom'];
        $nom    = $_GET['nom'];
        $serie  = $_GET['serie'];

        $requete = $bdd->prepare('INSERT INTO users(prenom, nom, serie_preferee) VALUE(?, ?, ?)') or die(print_r($bdd->errorInfo()));
        $requete->execute(array($prenom, $nom, $serie));

        header('location: ../');

    }

    // LIRE/AFFICHE DES INFORMATIONS
    $requete = $bdd->query('SELECT prenom, nom, serie_preferee
                            FROM users');
                             
    echo'<table border>
            <tr>
                <th>Pseudo</th>
                <th>Nom</th>
                <th>Série préférée</th>
            </tr>';
    
    while($donnees = $requete->fetch()){ 
        // echo $donnees['prenom'];
        echo '<tr>
                <td>'.$donnees['prenom'].'</td>
                <td>'.$donnees['nom'].'</td>
                <td>'.$donnees['serie_preferee'].'</td> 
            </tr>';
    }

    $requete->closeCursor(); // ferme connexion à la BDD (evite bug avec code complexe)

    echo '</table>';

    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
</head>
<body>
    <h1>Ajouter un utilisateur</h1>

    <form method="get" action="index.php">
        <table>
            <tr>
                <td>Prénom</td>
                <td><input type="text" name="prenom"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="nom"></td>
            </tr>
            <tr>
                <td>Série préférée</td>
                <td><input type="text" name="serie"></td>
            </tr>
        </table>
            <button type="submit">Ajouter</button>
    </form>

    <!-- http://localhost/index.php?prenom=Naruto&nom=Uzumaki&serie=Ninja -->
</body>
</html>