<?php $this->titre = "Mon Blog - Blog"; ?>

	<div class="jumbotron jumbotron-header text-center" style="margin-bottom:0">
    	<h1>Jean Forteroche</h1>
    	<p>Blog du roman "Billet simple pour l'Alaska" </p> 
  	</div>
  	
    <div class="container pageBlog" style="margin-top:30px">
    	<h2 class="titrePage">Liste des articles</h2>
    	<div class="row">

<?php foreach ($articles as $article):?>
			<div class="col-sm-12 col-md-6">
				<figure class="card-body">
				    <?php if ($article['media'] != NULL) { ?>
				        <img class="imageBlog" src="Contenu/<?= $article['media'] ?>" alt="image paysage Alaska">
				    <?php } else { ?>
				        <img class="imageBlog imageDefaut" src="Contenu/defaut_image.gif" alt="image par défaut">
				    <?php } ?>
					<figcaption>
						<h2 class="titreBillet"><?= $article['titre'] ?></h2>
						<a href="Article-<?= $article['id'] ?>" class=""></a>
					</figcaption>			
				</figure>
			</div>
			<!--<div class="col-sm-12 offset-md-0">
				<h2 class=""><?= $article['titre'] ?></h2>
			</div>-->
<?php endforeach; ?>

		</div>	    
	</div>
