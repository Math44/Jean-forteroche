<?php 

$this->titre = "Mon Blog - Administration"; 
?>

<div class="container partieAdmin pageAdmin" style="margin-top:30px">
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
				<li><a href="Deconnexion"><button type='submit' class='btn btn-primary pull-right btnDeco'>Log Out</button></a></li>
			</ul>
		</nav>
	</div>

	<article>
		<h2 class="titrePage">Commentaire(s) signalé(s):</h2>
	</article>
	<div class="single_post col-sm-12">
		<?php
		if ($comReport != NULL) {

			foreach ($commentaires as $report) { 
			?>
				<div class="row">	
					<div class="blocBtn">	
						<a href="Admin-Supprimer-Commentaire-<?= $report['id'] ?>">
							<button class='btn btn-primary btnDelete'><img src="Contenu/ico-supprimer.png" alt="supprimer" width="50px"></button>
						</a>
						<a href="Admin-Valider-Commentaire-<?= $report['id'] ?>">
							<button class='btn btn-primary btnValid'><img src="Contenu/ico-valider.png" alt="valider" width="50px"></button>
						</a>
					</div>
					<div class="blocComment">
						<p class="textCommentaire">
							<span class="artDate"><strong>Posté le : </strong><em><?= $report['date'] ?></em></span>
								- 
							<span class="comAuteur"><strong>Auteur : </strong><em><?= $report['auteur'] ?></em></span><br />
							<span class="comContenu"><strong>Contenu : </strong><em><?= htmlspecialchars($report['contenu']) ?></em></span>
						</p>
					</div>
				</div>
				<hr>
			<?php }
		} 
		else { ?>
			<p>Aucun commentaire(s) signalé(s)</p>
		<?php } ?>
	</div>
</div>