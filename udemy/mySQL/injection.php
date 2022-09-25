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
    // Connexion BDD = HOTE : localhost - sql.monserveur.com
    // NOM DE LA BASE : formation_users
    // LOGIN : root
    // MDP : root (sur MAC) 

    // Connexion BDD 
    /* try {} catch(Exception $e) {} (structure try catch) Afficher Erreur dans catch quand traitement erroné*/
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=formation_users;charset=utf8', 'root', 'prout');
    } catch(Exception $e) {
        die('Erreur : '. $e->getMessage());
    }

    // LIRE DES INFORMATIONS
    // $prenom = '" OR 1=1#'; //injection
    //$prenom = htmlspecialchars($prenom); //protege données
    $prenom = 'Alain';
    $nom = 'Stendhaledfsgfd';
    //prepare = prepare mais n'execute pas contrairement à query et exec (se proteger des injections)
    $requete = $bdd->prepare('SELECT prenom, nom, serie_preferee, metier
                            FROM users
                            LEFT JOIN jobs
                            ON users.id = jobs.id_user
                            /*WHERE prenom = "'.$prenom.'" */
                            WHERE prenom = ? || nom = ?');
    $requete->execute(array($prenom, $nom));
                           
         
    echo'<table border>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Série préférée</th>
                <th>Métier</th>
            </tr>';
    
    while($donnees = $requete->fetch()){ 
        // echo $donnees['prenom'];
        echo '<tr>
                <td>'.$donnees['prenom'].'</td>
                <td>'.$donnees['nom'].'</td>
                <td>'.$donnees['serie_preferee'].'</td>
                <td>'.$donnees['metier'].'</td>
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
    
</body>
</html>