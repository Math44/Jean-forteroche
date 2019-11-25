<?php 

$this->titre = "Mon Blog - Login"; 
?>

<div class="container pageLogin" style="margin-top:30px">
	<h2 class="titrePage">Connexion</h2>
	<div class="row single_post">

		<form action="index.php?action=login" method='POST'>
			<div class="form-group">
				<input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
			</div>
			<div class="form-group">
				<input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe">
			</div>
			<button type="submit" class="btn center-block">Se connecter</button>
		</form>
	</div>
</div>