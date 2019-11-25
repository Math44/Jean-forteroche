<?php
require_once 'Modele/Modele.php';

class Admin extends Modele {

//Deconnecte de la session Admin
    public function loggedOut() {
    	session_destroy();
		header('location: Connexion');
    }

//Vérifie si user/mdp = Bdd && identifie = 1
 	public function checkLogin() {
		$identifiant_saisi = $_POST['pseudo'];
		$mdp_saisi = $_POST['motdepasse'];

		$sql = 'select USE_LOGIN as user, USE_MDP as mdp from T_USER';
		$login = $this->executerRequete($sql);
		$identifie = 0;
		while ($user = $login->fetch()) {
			if ($user['user'] == $identifiant_saisi && $user['mdp'] == sha1($mdp_saisi)) {
				$identifie = 1;
			}
		}
		if ($identifie == 1) {
			$_SESSION['identifie'] = $identifie;
			$_SESSION['identifiant'] = $identifiant_saisi;
		}
	}
}