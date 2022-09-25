<?php
    // FORMULAIRE

    if(isset($_POST['prenom']) && isset($_POST['nom'])) {

        echo'Bonjour '.$_POST['prenom'].' '.$_POST['nom'].' !';
    }

    echo'<form method="post" action="index.php">
            <p>
                <table>
                    <tr>
                        <td>Prénom</td>
                        <td><input type ="text" name="prenom" /></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td><input type="text" name="nom" /></td>
                    </tr>
                </table>
                <button type="submit" >Envoyer</button>
            <p>
        </form>';