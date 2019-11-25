<?php
abstract class Modele {
    /** Objet PDO d'accès à la BD */
    private $bdd;

    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
    
    private function getBdd() {
        if ($this->bdd == null) {
            // Création de la connexion

            $this->bdd = new PDO('mysql:host=db5000186348.hosting-data.io;dbname=dbs181158;charset=utf8', 'dbu80501', '@6431&1Base359-*De/*Donnees*-9876/',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return $this->bdd;
    }
}