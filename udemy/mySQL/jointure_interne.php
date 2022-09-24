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

    // JOINTURES INTERNE
    // WHERE : moins en moins choisi, moins clair
    // JOIN : plus en plus choisir, plus clair
    
    // AJOUTER UN METIER
    /* $requete = $bdd->exec('INSERT INTO jobs(id_user, metier) VALUES(4, "PDG")'); */

    // LIRE DES INFORMATIONS
    /* $requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier
                            FROM users, jobs
                            WHERE users.id = jobs.id_user'); */
    
    $requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier
                            FROM users
                            INNER JOIN jobs
                            ON users.id = jobs.id_user');

    /* $requete = $bdd->query('SELECT prenom, nom, u.serie_preferee AS serie_preferee, j.serie_preferee AS metier
                            FROM users AS u
                            INNER JOIN jobs AS j
                            ON u.id = j.id_user'); */
         
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