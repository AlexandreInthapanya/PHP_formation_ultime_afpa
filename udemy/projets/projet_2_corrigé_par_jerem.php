<?php
    //VERIFIER SI L'IMAGE A BIEN ETE RECUE
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $error = 1;

        //VERIFIER LA TAILLE DE L'IMAGE
        if($_FILES['image']['size'] <= 3000000) {

        //VERIFIER QU'IL S'AGIT BIEN D'UNE IMAGE    
        $tmpName = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $size = $_FILES['image']['size'];
        $error = $_FILES['image']['error'];

        $spawn = move_uploaded_file($tmpName, './uploads/'.$name);
        }  
    };
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hébergeur d'images gratuit</title>
</head>
<style type="text/css">
    html, body {margin: 0;}
    header { text-align: center;color : white; background-color: red;}
    article { margin-top: 50px; background: #f7f7f7; padding: 10px;}
    h1 { margin-top: 0;}
    button { margin-top: 10px; text-align: center;}
</style>
<body>
    <header>
        <h2>PHOTOSHOOT</h2>
    </header>
    <article>
        <h1>Hébergez une image</h1>
            <?php
                if(isset($error) && $error == 0) {
                    echo '<img src="'.'./uploads/'.$name.'" />';
                }
                else{
                    echo $error;
                }
                echo $address . '</br>';
                echo 'Info is : </br>';
                var_dump($_FILES);
                echo 'PATH EXT is : </br>';
                var_dump(pathinfo($_FILES['image']['name'])['extension']);
                echo 'upload is : </br>';
                var_dump(is_uploaded_file($_FILES['image']['tmp_name']));
                echo 'reponse is : </br>';
                var_dump($spawn);
                echo 'tmp name is : </br>';
                var_dump($tmpName);
            ?>
<form method="POST" enctype="multipart/form-data">
            <p>
                <input type="hidden"/>
                <input type="file" required name="image"/><br />
                <button type="submit">Héberger</button>
            </p>
    </article>
</body>
</html>