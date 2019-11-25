<?php 
$this->titre = "Mon Blog - Modifier un Article"; 
?>

<div class="container partieAdmin pageUpdateArticle" style="margin-top:30px">
	<article>
		<h2 class="adminWelcome">Bienvenue <?php echo $_SESSION['identifiant'] ?> </h2>
	</article>
	<h2 class="titrePage">Panneau d'administration</h2>
	<div class="single_post col-sm-12">
		<head>
		  <script src="https://cdn.tiny.cloud/1/yybgwlyorcs89hixwzgsg7kcyf6r3qu2qz2z8azogwwrg5bs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		  <script>tinymce.init({selector:'textarea'});</script>
		</head>
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
		<h2 class="titrePage">Modifier un article:</h2>
	</article>
	<div class="single_post col-sm-12">
		<form action='index.php?action=updateArticle' method="post">
			<input type="hidden" name="id" value="<?php echo $viewUpdateArticle['id']; ?>">
			<label>Auteur</label><input class="form-control" id="auteur" name="auteur" type="text" value="<?php echo $viewUpdateArticle['auteur']; ?>">
			<br>
			<label>Titre</label><input class="form-control" type="text" name="titre" value="<?php echo $viewUpdateArticle['titre']; ?>">
			<br>
			<label>Contenu:</label>
			<textarea class="form-control" name="contenu">
				<?php echo $viewUpdateArticle['contenu']; ?>
			</textarea>
			<br>
			<button type='submit' class='btn btn-primary'>Publier</button>
		</form>
	</div>
</div>