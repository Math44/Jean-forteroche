<?php
require_once 'Modele/Modele.php';

class Article extends Modele {

//READ : Affiche un article
    public function getArticle($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_AUTEUR as auteur, BIL_TITRE as titre, BIL_CONTENU as contenu, BIL_MEDIA as media from T_BILLET'
                . ' where BIL_ID=?';
        $article = $this->executerRequete($sql, array($idBillet));
        if ($article->rowCount() > 0)
            return $article->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun article ne correspond à l'identifiant '$idBillet'");
    }

//READ : Affiche tous les articles
    public function getArticles() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_AUTEUR as auteur, BIL_TITRE as titre, BIL_CONTENU as contenu, BIL_MEDIA as media from T_BILLET'
                . ' order by BIL_ID asc';
        $articles = $this->executerRequete($sql);
        return $articles;
    }

    public function prevArticle($idBillet) {
        $sql = 'select BIL_ID from T_BILLET where BIL_ID < :BIL_ID order by BIL_ID desc limit 1';
        $prevArticle = $this->executerRequete($sql, array('BIL_ID' => $idBillet));
        $prevArticle->setFetchMode(PDO::FETCH_ASSOC);
        return $prevArticle->fetchColumn();
    }
    public function nextArticle($idBillet) {
        $sql = 'select BIL_ID from T_BILLET where BIL_ID > :BIL_ID order by BIL_ID asc limit 1';
        $nextArticle = $this->executerRequete($sql, array('BIL_ID' => $idBillet));
        $nextArticle->setFetchMode(PDO::FETCH_ASSOC);
        return $nextArticle->fetchColumn();
    }

//READ : Affiche le dernier article publié
    public function lastArticle() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_AUTEUR as auteur, BIL_TITRE as titre, BIL_CONTENU as contenu, BIL_MEDIA as media from T_BILLET'
                . ' order by BIL_ID desc limit 0, 1';
        $lastArticle = $this->executerRequete($sql);
        return $lastArticle;
    }

//CREATE : Ajoute un article
    public function newArticle($auteur, $titre, $contenu) {
        $sql = 'insert into T_BILLET(BIL_DATE, BIL_AUTEUR, BIL_TITRE, BIL_CONTENU, BIL_MEDIA)'
            . ' values(?, ?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");
        $image = $_FILES['image']['name'];
        $target = "Contenu/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $this->executerRequete($sql, array($date, $auteur, $titre, $contenu, $image));
        header('location: Admin-Articles');
    }

//UPDATE : Modifie un article
    public function updateArticle() {
        $auteur = $_POST['auteur'];
        $titre = $_POST['titre'];
        $contenu = $_POST['contenu'];
        $id = $_POST['id'];
        $sql = "update T_BILLET set BIL_AUTEUR='$auteur', BIL_TITRE='$titre', BIL_CONTENU='$contenu' where BIL_ID=$id";
        $this->executerRequete($sql);
        header('location: Admin-Articles');
    }

//DELETE : Supprime un article
    public function deleteArticle() {
        $idBillet = $_GET['id'];
        $sql = ("delete from T_BILLET where BIL_ID=$idBillet");
        $this->executerRequete($sql);
    }
}