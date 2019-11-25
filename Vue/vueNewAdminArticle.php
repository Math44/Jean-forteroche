<?php 

$this->titre = "Mon Blog - Ajouter un Article"; 
?>

<div class="container partieAdmin pageNewAdminArticle" style="margin-top:30px">
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
		<h2 class="titrePage">Ajouter un article:</h2>
	</article>			
	<div class="single_post col-sm-12">
		<form action="index.php?action=publier" method="post" enctype="multipart/form-data">
			<label>Image :</label><input type="file" name="image">
		    <br> 
			<label>Auteur</label><input required class="form-control" id="auteur" name="auteur" type="text">
			<br>
			<label>Titre</label><input required class="form-control" type="text" name="titre">
			<br>
			<label>Contenu:</label>
			<textarea class="form-control" name="contenu"></textarea>
			<br>
			<input type="hidden" name="size" value="500000" >
			<button type='submit' name ="upload" class='btn btn-primary'>Publier</button>
		</form>
	</div>		
</div>