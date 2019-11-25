<?php 
$this->titre = "Mon Blog - Liste des Articles"; 
?>

<div class="container partieAdmin pageListAdminArticle" style="margin-top:30px">
	<article>
		<h2 class="adminWelcome">Bienvenue <?php echo $_SESSION['identifiant'] ?> </h2>
	</article>
	<h2 class="titrePage">Panneau d'administration</h2>
	<div class="single_post col-sm-12">
		<nav class="navAdmin">
			<ul>
				<li><a href="Admin-Commentaires"><button class='btn btn-primary btnAdmin'>Commentaires</button></a></li>
				<li><a href="Admin-Articles"><button class='btn btn-primary btnAdmin'>Articles</button></a></li>
				<li><a href="Admin-Ajouter-Article"><button class='btn btn-primary btnAdd'>Ajouter article</button></a></li>
				<li><a href="Deconnexion"><button type='submit' class='btn btn-primary pull-right btnDeco'>Log Out</button></a>
			</ul>
		</nav>
	</div>

	<article>
		<h2 class="titrePage">Liste des articles:</h2>
	</article>
	<div class="single_post col-sm-12">
		<?php foreach ($articles as $article): ?>
            <div class="row">	
				<div class="blocBtn"> 	                	
	            	<a href="Admin-Supprimer-Article-<?= $article['id'] ?>">
	                	<button class='btn btn-primary btnDelete'><img src="Contenu/ico-supprimer.png" alt="supprimer" width="50px"></button>
	            	</a> 
	            	<a href="Admin-Modifier-Article-<?= $article['id'] ?>">
	                	<button class='btn btn-primary btnUpdate'><img src="Contenu/ico-modifier.png" alt="modifier" width="50px"></button>
	            	</a>
	            	<a href="Article-<?= $article['id'] ?>">
	                	<button class='btn btn-primary btnSee'><img src="Contenu/ico-voir.png" alt="voir" width="50px"></button>
	            	</a>
            	</div>
            	<div class="blocArticle">
            		<p class='adminLienArticle'>
                		<span class="artTitre"><em><?= $article['titre'] ?></em></span><br />
                		<span class="artDate"><strong>Posté le : </strong><em><?= $article['date'] ?></em></span>
                	</p>
                </div>
			</div>
            <hr>
        <?php endforeach; ?>
	</div>
</div>