<?php
session_start();

if(isset($_SESSION['connect'])){
    header('location: accueil.php');
    exit();
}

require('src/connection.php');

if(!empty($_POST['email']) && !empty($_POST['password'])){

    // VARIABLES
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    // $error      = 1;

    // CRYPTER PASSWORD
    $password = "aq1".sha1($password."1254")."25";

    // TEST SI EMAIL UTILISE
    $req = $db->prepare('SELECT * FROM users WHERE email = ?');
    $req->execute(array($email));

    // RECUPERER DONNEES UTILISATEUR
    while($user = $req->fetch()){ //retourne une ligne à la fois sous forme de tableau

        if($password == $user['password']){
            // $error = 0;
            // SESSION
            $_SESSION['connect'] = 1;
            $_SESSION['pseudo']  = $user['pseudo'];

            if(isset($_POST['connect'])){
                // log 
                // $user['secret']
                setcookie('log', $user['secret'], time() + 365*24*3600, '/', null, false, true);
            
            }

            header('location: connection.php?success=1');
            exit();
        }

    }

    header('location: connection.php?error=1');

    // if($error == 1){
    //     header('location: connection.php?error=1');
    // }  deboggage

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="/AFPA/udemy/design/style.css">
</head>
<body>
    <header>
        <h1>Connexion</h1>
    </header>

    <div class="container">
        <p id="info">Bienvenue sur mon site, si vous n'êtes pas inscrit, <a href="../udemy/index.php">Inscrivez-vous</a></p>
    
        <!-- PSEUDO
            EMAIL 
            MOT DE PASSE -->

        <?php
            if(isset($_GET['error'])){
                echo '<p id="error">Nous ne pouvons pas vous authentifier.</p>';
            }
            else if(isset($_GET['success'])){
                echo '<p id="success">Vous êtes maintenant connecté</p>';
            }
        ?>

        <div id="form">
            <form method="post" action="connection.php">
                <table>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" placeholder="Ex : example@gmail.com" required></td>
                    </tr>
                    <tr>
                        <td>Mot de passe</td>
                        <td><input type="password" name="password" placeholder="Ex : *****" required></td>
                    </tr>
                </table>
                <p>
                    <label><input type="checkbox" name="connect" checked>Connexion automatique</label>
                </p>
                <div id="button">
                    <button>Connexion</button>
                </div>
        
            </form>
        </div>
    </div>

</body>
</html>