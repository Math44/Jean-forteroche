<?php

require_once 'Controleur/ControleurArticle.php';
require_once 'Controleur/ControleurAdmin.php';
require_once 'Vue/Vue.php';

class Routeur {
    private $ctrlArticle;
    private $ctrlContact;
    private $ctrlAdmin;

    public function __construct() {
        $this->ctrlArticle = new ControleurArticle();
        $this->ctrlAdmin = new ControleurAdmin();
    }

// Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {

            //Partie Visiteur
                if ($_GET['action'] == 'article') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) {
                        $this->ctrlArticle->article($idBillet);
                    }
                    else
                        throw new Exception("L'article que vous selectionnez n'existe pas.");
                }
                else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlArticle->newComment($auteur, $contenu, $idBillet);
                }
                else if ($_GET['action'] == 'publier') { 
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $this->ctrlArticle->newArticle($auteur, $titre, $contenu);
                }
                else if ($_GET['action'] == 'blog') {
                    $this->ctrlArticle->blog();
                }
                else if ($_GET['action'] == 'reportComment') {
                    $this->ctrlArticle->reportComment();
                }

            //Connexion Partie Admin
                else if($_GET['action'] == 'login') {
                    if (isset($_SESSION['identifie'])) {
                        header('location: Admin-Commentaires');
                    }
                    else {
                        if (isset($_POST['pseudo']) && isset($_POST['motdepasse'])) {
                            $identifie = $this->ctrlAdmin->checkLogin();
                            if (isset($_SESSION['identifie'])) {
                                header('location: Admin-Commentaires');
                            }
                            else {
                                throw new Exception("Nom d'utilisateur et/ou Mot de passe, incorrecte.");
                            }                                                   
                        }
                        else {
                            $this->ctrlAdmin->login();
                        } 
                    }
                }

            //Partie Admin
                else if(isset($_SESSION['identifie'])) {
                    if ($_GET['action'] == 'admin') {
                        $this->ctrlAdmin->vueAdmin();
                    }
                    else if ($_GET['action'] == 'viewUpdateArticle') {
                        $idBillet = intval($this->getParametre($_GET, 'id'));
                        $this->ctrlAdmin->viewUpdateArticle($idBillet);
                    }
                    else if ($_GET['action'] == 'newAdminArticle') {
                        $this->ctrlAdmin->newAdminArticle();
                    } 
                    else if ($_GET['action'] == 'listAdminArticle') {
                        $this->ctrlAdmin->listAdminArticle();
                    }
                //Article
                    else if ($_GET['action'] == 'deleteArticle') {
                        $this->ctrlArticle->deleteArticle();
                    }
                    else if ($_GET['action'] == 'updateArticle') {
                        $this->ctrlArticle->updateArticle();
                    }
                //Commentaire
                    else if ($_GET['action'] == 'deleteComment') {
                        $this->ctrlArticle->deleteComment();
                    }
                    else if ($_GET['action'] == 'cancelReportComment') {
                        $this->ctrlArticle->cancelReportComment();
                    }

                    else if ($_GET['action'] == 'deconnecter') {
                        $this->ctrlAdmin->loggedOut();
                    }
                    else {
                        throw new Exception("Vous n'êtes pas connecté.");
                    }
                }

                else {
                    throw new Exception("Action non valide");
                }
            }
            else {
                $this->ctrlArticle->Accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
//Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
//Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else {
            throw new Exception("Paramètre '$nom' absent");
        }
    }
}