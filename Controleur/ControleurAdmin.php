<?php

session_start();

require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Admin.php';
require_once 'Vue/Vue.php';

class ControleurAdmin {
    private $admin;
    private $article;
    private $commentaire;

    public function __construct() {
        $this->admin = new Admin();
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

//1* Affichage la page "Login"
    public function login() {
        $vue = new Vue("Login");
        $vue->generer(array('login'));
    }

//2* Vérifie si user/mdp = Bdd && identifie = 1
    public function checkLogin() {
        $this->admin->checkLogin();
    }

//3* Affiche la page "Admin"
    public function vueAdmin() {
        $commentaires = $this->commentaire->getReportComments();
        $comReport = $this->commentaire->reportCom();
        $vue = new Vue("Admin");
        $vue->generer(array('commentaires' => $commentaires, 'comReport' => $comReport));
    }

//READ : Affiche la page "newAdminArticle"
    public function newAdminArticle() {
        $vue = new Vue("NewAdminArticle");
        $vue->generer(array('vueNewAdminArticle'));
    }

//READ : Affiche la page "ListAdminArticle" & la liste de tous les articles (partie admin)
    public function listAdminArticle() {
        $articles = $this->article->getArticles();
        $vue = new Vue("ListAdminArticle");
        $vue->generer(array('articles' => $articles));
    }

//READ : Affiche la page "ViewUpdateArticle" & l'article à modifier (partie admin)
    public function viewUpdateArticle($idBillet) {
        $viewUpdateArticle = $this->article->getArticle($idBillet);
        $vue = new Vue("UpdateArticle");
        $vue->generer(array('viewUpdateArticle' => $viewUpdateArticle));
    }

//Deconnecte de la session Admin
    public function loggedOut() {   
        $this->admin->loggedOut();
    }

}