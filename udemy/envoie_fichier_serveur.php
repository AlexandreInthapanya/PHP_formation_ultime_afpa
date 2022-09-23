<?php
    // ENVOI FICHIER PHP
    // TRAITEMENT
    /*  $_FILES['image']['name'] // NOM
        $_FILES['image']['type'] // TYPE image/png
        $_FILES['image']['size'] // TAILLE
        $_FILES['image']['tmp_name'] // EMPLACEMENT FICHIER TEMPORAIRES
        $_FILES['image']['error'] // ERREUR 
        isset = exist */

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0){ // verification image et si elle existe
        // 1mo = 1 000 000 d'octets
        if ($_FILES['image']['size'] <= 3000000){ // verification taille

            $informationsImage = pathinfo($_FILES['image']['name']); //récuperer information image
            $extensionImage    = $informationsImage['extension']; // recevoir extension image
            $extensionsArray   = array('png', 'gif', 'jpg', 'Jpeg'); // verification extension

            if(in_array($extensionImage, $extensionsArray)) {
                
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.time().rand().rand().'.'.$extensionImage);//.basename($_FILES['image']['name'])); //parametre : filename, destination (envoie image dans serveur) (.basename() .rand() )
                echo 'Envoie réussi !';

            }
        }
    }
    

    echo'<form method="post" action="index.php" enctype="multipart/form-data">
            <p>
                <h1>Formulaire</h1>
                <input type="file" name="image" /><br />
                <button type="submit">Envoyer</button>
            </p>
        </form>';