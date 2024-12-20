<?php

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 *
 * @author Baptiste Pesquet
 */
 
require_once 'config_db.php';

/**
 * Classe abstraite fournissant une interface pour les modèles interagissant avec une base de données.
 */
abstract class Modele {

    private $bdd;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     * 
     * @param string $sql
     * @param array $params : Les valeurs potentiellement associées à la requête
     * @return PDOStatement
     */
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

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     * 
     * @return PDO
     */
    private function getBdd() {
		global $localhost, $localdbname, $localuser, $localpassword;
        if ($this->bdd == null) {
            $this->bdd = new PDO("mysql:host=$localhost;dbname=$localdbname;charset=utf8",
                    "$localuser", "$localpassword",
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}