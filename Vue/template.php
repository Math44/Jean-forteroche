<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.1/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
        <link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="Contenu/style.css" />
        <title><?= $titre ?></title>
    </head>

    <body>
        <nav class="navIndex">
            <div class="collapse navbar-collapse">
                
                <ul class="nav navbar-nav">
                    <li class="btnLeft"><a href="Accueil">Accueil</a></li>
                    <li class="btnLeft"><a href="Blog">Blog</a></li>
                    <li class="btnRight"><a href="Connexion"><i class="fas fa-sign-in-alt"></i> Log in</a></li>
                </ul>

            </div>
            
            
        </nav>

        <div id="global">

            <section>
                <div id="contenu">
                    <?= $contenu ?>
                </div> <!-- #contenu -->
            </section>
        </div> <!-- #global -->
        <div class="jumbotron jumbotron-footer text-center" style="margin-bottom:0">
            <p>Copyright © 2019 Jean FORTEROCHE - Billet simple pour l'Alaska - Projet n°4</p>
        </div>
    </body>
</html>