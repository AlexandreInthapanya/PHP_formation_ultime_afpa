<?php
    if(!empty($_POST['pseudo'])) {

        $pseudo = $_POST['pseudo'];
        
        //cookie avant le doctype
        setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true); //parametre : nom, valeur, date expiration

        //eviter faille XSS : null, null, false, true (permet d'activer le http only)
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP</title>
</head>
<body>
    <h1>Entrer votre pseudo</h1>

    <form method="post" action="index.php">
        <table>
            <tr>
                <td>Pseudo</td>
                <td><input type="text" name="pseudo"></td>
            </tr>
        </table>
            <button type="submit">Se connecter</button>
    </form>

    <?php
    if(!empty($_COOKIE['pseudo'])){
        echo'<h2>Bienvenue '.htmlspecialchars($_COOKIE['pseudo']).'</h2>';
    }
    ?>

</body>
</html>