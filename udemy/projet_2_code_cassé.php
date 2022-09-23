<?php 
    // VERIFIER SI IMAGE BIEN RECU

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        //variable
        $error = 1;

        // TAILLE
        if($_FILES['image']['size'] <= 3000000){

            //EXTENSION
            $informationsImage = pathinfo($_FILES['image']['name']);
            $extensionImage = $informationsImage['extension'];
            $extensionsArray = array('jpg', 'png', 'jpeg', 'gif');

            if(in_array($extensionImage, $extensionsArray)){

                $address = 'uploads/'.time().rand().rand();
                move_uploaded_file($_FILES['image']['tmp_name'], $address );
                echo'Envoie réussi !';
                $error = 0;
            }

        }

    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Hébergeur d'images gratuit</title>
    </head>
    <style type="text/css">
        html, body {
            margin: 0;
            font-family: georgia;
        }
        header{
            text-align: center; 
            background: red;
            color: white;
        }
        article{
            margin-top: 50px;
            background: #f7f7f7;
            padding: 10px;
        }
        button{
            margin-top: 10px;
        }
        h1{
            margin-top:0;
            text-align: center;
        }
        #image{
            max-width: 100px;
        }
        #presentation-image{
            text-align: center;
        }
        .contener {
            width : 500px;
            margin : auto;
        }
    </style>
    <body>
        <!-- HEADER -->
        <header>
            <h2>PHOTOSHOOT</h2>
        </header>

        <!-- FORMULAIRE -->
        <div class="contener">
            <article>
                <h1>Hébergez une image</h1>

                <?php
                    if(isset($error) && $error == 0){

                        echo'<div 
                        id="presentation-picture">
                            <img src="'.$address.'"
                                id="image" />
                        
                        
                        <input type="text"
                            value="http://localhost/'.
                            $address.'" />;
                            </div>';
                          
                    }
                ?>

                <form method="post" action="index.php" enctype="multipart/form-data"></form>
                <p>
                    <input type="file" name="image" /><br />
                    <div style="text-align: center";>
                        <button type="submit">Héberger</button>
                    </div>
                </p>
            </article>
        </div>

    </body>
</html> */