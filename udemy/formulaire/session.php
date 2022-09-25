<?php
session_start();
session_destroy(); 
    if(!empty($_POST['pseudo'])) {

        $pseudo = $_POST['pseudo'];
        
        $_SESSION['pseudo'] = $pseudo;

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
    if(!empty($_SESSION['pseudo'])){
        echo'<h2>Bienvenue '.htmlspecialchars($_SESSION['pseudo']).'</h2>';
    }
    ?>

</body>
</html>