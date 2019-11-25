<?php $this->titre = "Mon Blog - Accueil"; ?>
<head>
  </style>
</head>

<body>
  <div class="jumbotron jumbotron-header text-center" style="margin-bottom:0">
    <h1>Jean Forteroche</h1>
    <p>Blog du roman "Billet simple pour l'Alaska" </p> 
  </div>

  <div class="container pageAccueil" style="margin-top:30px">
    <h2 class="titrePage">A propos de moi</h2>
    <div class="row">
      <div class="aboutMe col-12">
        <div class="col-12 col-lg-3">
          <img class="imgAuteur" src="Contenu/Auteur2.jpg" alt=""width="350">
        </div>

        <div class="col-12 col-lg-4">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In inventore quasi libero praesentium dignissimos ea molestias, temporibus laudantium distinctio nesciunt molestiae soluta provident culpa, alias deleniti minus. <br>
          Repellendus officiis dolores accusamus eius alias nostrum beatae eveniet dicta obcaecati perferendis, velit sapiente aspernatur. In inventore quasi libero praesentium dignissimos ea molestias quas libero.</p>
        </div>
        <div class="col-12 col-lg-4">
          <p>Repellendus officiis dolores accusamus Lorem ipsum dolor sit amet, consectetur adipisicing elit. In inventore quasi libero praesentium dignissimos ea molestias, temporibus laudantium distinctio nesciunt molestiae soluta provident culpa, alias deleniti minus. <br>Modi quasi placeat sint dicta, natus ab commodi voluptas ratione explicabo aperiam vitae ipsam dignissimos ducimus id, eum eos voluptatum fuga accusamus.</p>
        </div>
      </div>
    </div>

  <?php foreach ($articles as $article):?>

    <div class="row lastPost">
    <h2 class="titrePage">Dernier article</h2>
    <figure class="col-sm-12 col-md-6 lastPost">
      <?php if ($article['media'] != NULL) { ?>
        <img class="imageBlog" src="Contenu/<?= $article['media'] ?>" alt="image paysage Alaska">
      <?php } else { ?>
        <img class="imageBlog imageDefaut" src="Contenu/defaut_image.gif" alt="image par défaut">
      <?php } ?>
      <figcaption>
        <h2 class="titreBillet"><?= $article['titre'] ?></h2>
        <a href="Article-<?= $article['id'] ?>" class="btn"></a>
      </figcaption>     
    </figure>
    </div>

  <?php endforeach; ?>

    </div>
  </div>

</body>
</html>