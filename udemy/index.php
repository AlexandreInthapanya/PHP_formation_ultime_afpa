<?php
// PROJET 4 : Un espace membre
// INSCRIPTION
session_start();

require('src/connection.php');

if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])){

    // VARIABLES
    $pseudo            = $_POST['pseudo'];
    $email             = $_POST['email'];
    $password          = $_POST['password'];
    $pass_confirm      = $_POST['password_confirm'];

    // TEST SI PASSWORD = PASSWORD_CONFIRM
    if($password != $pass_confirm){
        header('location: index.php?error=1&pass=1');
        exit();
    }

    // TEST SI EMAIL UTILISE
    $req = $db->prepare("SELECT count(*) as numberEmail 
                         FROM users WHERE email = ?");
    $req->execute(array($email));

    while($email_verification = $req->fetch()){
        if($email_verification['numberEmail'] != 0){
            header('location: index.php?error=1&email=1');
            exit();
        }
    }

    // HASH
    $secret = sha1($email).time();
    $secret = sha1($secret).time().time();

    // CRYPTAGE DU PASSWORD
    $password = "aq1".sha1($password."1254")."25";

    // ENVOI DE LA REQUETE 
    $req = $db->prepare("INSERT INTO users(pseudo, email, password, secret) VALUES(?, ?, ?, ?)");
    $req->execute(array($pseudo, $email, $password, $secret));

    header('location: index.php/?success=1');
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP et MySQL : la formation ultime</title>
    <link rel="stylesheet" type="text/css" href="/AFPA/udemy/design/style.css">
</head>
<body>
    <header>
        <h1>Inscription</h1>
    </header>

    <div class="container">

        <?php
            if(!isset($_SESSION['connect'])){ ?>
                <p id="info">Bienvenue sur mon site, pour en voir plus, inscrivez-vous. Sinon, <a href="connection.php">Connectez-vous</a></p>
            
                <!-- PSEUDO
                    EMAIL
                    MOT DE PASSE
                    MOT DE PASSE A CONFIRMER -->
        
            <?php 

            if(isset($_GET['error'])){
                    
                if(isset($_GET['pass'])){
                    echo '<p id="error">Les mots de passe ne correspondent pas.</p>';
                }
                else if(isset($_GET['email'])){
                    echo '<p id="error">Cette adresse email est déjà utilisée.</p>';
                }
            }
            else if(isset($_GET['success'])){
                echo '<p id="success">Inscription prise correctement en compte.</p>';
            }
    
            ?> 

            <div id="form">
                <form method="post" action="index.php">
                    <table>
                        <tr>
                            <td>Pseudo</td>
                            <td><input type="text" name="pseudo" placeholder="Ex : Nicolas" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" placeholder="example@gmail.com" required></td>
                        </tr>
                        <tr>
                            <td>Mot de passe</td>
                            <td><input type="password" name="password" placeholder="Ex : *****" required></td>
                        </tr>
                        <tr>
                            <td>Ressaisir mot de passe</td>
                            <td><input type="password" name="password_confirm" placeholder="Ex : *****" required></td>
                        </tr>
                    </table>
                    <div id="button">
                        <button>Inscription</button>
                    </div>
        
                </form>
            </div>
        <?php }  else { ?>

        <p id="info">
            Bonjour <?= $_SESSION['pseudo'] ?><br>
            <a href="disconnection.php">Déconnexion</a>
        </p>
            
        <?php } ?>
        <!-- php echo ; = = -->

    </div>

</body>
</html>