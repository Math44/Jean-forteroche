<?php
require_once 'Modele/Modele.php';

class Commentaire extends Modele {

//READ : Renvoie la liste des commentaires associés à un article
    public function getComment($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, COM_REPORT as report from T_COMMENTAIRE'
                . ' where BIL_ID=? order by COM_DATE desc';
        $commentaire = $this->executerRequete($sql, array($idBillet));
        return $commentaire;
    }
      
//READ : Affiche tous les commentaires
    public function getComments() {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, COM_REPORT as report from T_COMMENTAIRE';
        $commentaires = $this->executerRequete($sql);
        return $commentaires;
    }

//READ : Renvoie la liste des commentaires signalés
    public function getReportComments() {
        $sql = ('select COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur, COM_CONTENU as contenu, COM_REPORT as report from T_COMMENTAIRE where COM_REPORT="1"');
        $commentaire = $this->executerRequete($sql);
        return $commentaire;
    }

//READ : Renvoie le nombre de commentaire signalé
    public function reportCom() {
        $sql = ('select COM_REPORT as report from T_COMMENTAIRE where COM_REPORT="1"');
        $cR = $this->executerRequete($sql);
        foreach($cR as $report);
        return $report;
    }

//READ : Renvoie le nombre de commentaire associé à un article
    public function nbrCommentaire($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur, COM_CONTENU as contenu, COM_REPORT as report from T_COMMENTAIRE where BIL_ID=?';
        $commentaire = $this->executerRequete($sql, array($idBillet));
        foreach($commentaire as $nbrCom);
        return $nbrCom;
    }

//CREATE : Ajoute un commentaire
    public function addComment($auteur, $contenu, $idBillet) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
        $idBilletActuel = $_POST['id'];
        header('location:Article-' . $idBilletActuel . '');
    }

//DELETE : Supprime un commentaire
    public function deleteComment() {
        $idComment = $_GET['id'];
        $sql = ("delete from T_COMMENTAIRE where COM_ID=$idComment");
        $this->executerRequete($sql);
        header('location: Admin-Commentaires');
    }

//Signale un commentaire
    public function reportComment() {
        $idComment = $_GET['id'];
        $sql = ("update T_COMMENTAIRE set COM_REPORT=1 where COM_ID=$idComment");
        $this->executerRequete($sql);
        $idBilletActuel = $_POST['id'];
        header('location:Article-' . $idBilletActuel . '');
    }

//Annule un commentaire signalé
    public function cancelReportComment() {
        $idComment = $_GET['id'];
        $sql = ("update T_COMMENTAIRE set COM_REPORT=0 where COM_ID=$idComment");
        $this->executerRequete($sql);
        header('location: Admin-Commentaires');
    }
}