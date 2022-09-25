<!-- 1 - STRUCTURE DE BASE
     2 - LIER FEUILLE DE STYLE
     3 - AJOUTER UNE LIAISON VERS NOTRE PETIT FAVICON -->

     <!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Raccourcisseur d'url express</title>
        <link rel="stylesheet"  type="text/css" href="/udemy/design/default.css">
        <link rel="icon" type="image/png" href="/udemy/pictures/favico.png">
    </head>
    <body>
        <!-- PRESENTATION -->
        <section id="hello">
            
            <!-- CONTAINER -->
            <div class="container" >
                
                <header>
                    <img src="/udemy/pictures/logo.png" alt="logo" id="logo">
                </header>

                <h1>Une url longue ? Raccourcissez-là</h1>
                <h2>Largement meilleur et plus court que les autres</h2>

                <!-- FORM -->
                <form method="post" action="../projets/projet_3_raccourcisseur_URL.php">
                    <input type="url" name="url" placeholder="Coller un lien à raccourcir">
                    <input type="submit" value="Raccourcir">
                </form>
            </div>  

        </section>

        <!-- BRANDS -->
        <section id="brands" >

            <!-- CONTAINER -->
            <div class="container" >
                <h3>Ces marques nous font confiance</h3>
                <img src="/udemy/pictures/1.png" alt="1" class="picture">
                <img src="/udemy/pictures/2.png" alt="2" class="picture">
                <img src="/udemy/pictures/3.png" alt="3" class="picture">
                <img src="/udemy/pictures/4.png" alt="4" class="picture">
            </div>

        </section>

        <!-- FOOTER -->
        <footer>
            <img src="/udemy/pictures/logo2.png" alt="logo" id="logo" >
            <br>
            2022 © Bitly <br>
            <a href="#">Contact</a> - <a href="#">A propos</a>
        </footer>
    </body>
</html>