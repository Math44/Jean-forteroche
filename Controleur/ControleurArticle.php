<?php
require_once 'Modele/Article.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurArticle {
    private $article;
    private $commentaire;

    public function __construct() {
        $this->article = new Article();
        $this->commentaire = new Commentaire();
    }

//READ : Affiche la page "Accueil" & le dernier article du blog
    public function Accueil() {
        $lastArticle = $this->article->lastArticle();
        $vue = new Vue("Accueil");
        $vue->generer(array('articles' => $lastArticle));
    }

//READ : Affiche la page "Article" & l'article cliqué
    public function article($idBillet) {
        $article = $this->article->getArticle($idBillet);
        $prevArticle = $this->article->prevArticle($idBillet);
        $nextArticle = $this->article->nextArticle($idBillet);
        $commentaire = $this->commentaire->getComment($idBillet);
        $nbrCommentaire = $this->commentaire->nbrCommentaire($idBillet);
        $vue = new Vue("Article");
        $vue->generer(array('article' => $article, 'commentaire' => $commentaire, 'prevArticle' => $prevArticle, 'nextArticle' => $nextArticle, 'nbrCommentaire' => $nbrCommentaire));
    }

//READ : Affiche la page "Blog" & la liste des articles
    public function blog() {
        $articles = $this->article->getArticles();
        $vue = new Vue("Blog");
        $vue->generer(array('articles' => $articles));
    }

/*
Article
*/
//CREATE : Ajoute un article
    public function newArticle($auteur, $titre, $contenu) {
        $this->article->newArticle($auteur, $titre, $contenu);
    }

//UPDATE : Modifie un article
    public function updateArticle() {
        $this->article->updateArticle();
    }

//DELETE : Supprime un article
    public function deleteArticle() {
        $this->article->deleteArticle();
        $this->commentaire->deleteComment();
        header('location: Admin-Articles');
    }  

/*
Commentaire
*/
//CREATE : Ajoute un commentaire
    public function newComment($auteur, $contenu, $idBillet) {
        $this->commentaire->addComment($auteur, $contenu, $idBillet);
    }

//DELETE : Supprime un commentaire
    public function deleteComment() {
        $this->commentaire->deleteComment();
    }

//Signale un commentaire
    public function reportComment() {
        $this->commentaire->reportComment();
    }

//Annule un commentaire signalé
    public function cancelReportComment() {
        $this->commentaire->cancelReportComment();
    }
}