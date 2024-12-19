<?php

require_once "Modele/Modele.php";

/**
 * Classe permettant de communiquer avec la table 'consommation_eau' de la base de données
 */
class Conso extends Modele {

    /**
     * return toutes les consommations journalière de la db
     *
     * @return PDOStatement
     */
    public function consoDernierJour(){
        $sql = "SELECT DATE_FORMAT(date_mesure, '%W %d-%m-%y') AS date, valeur_litres FROM consommation_eau ORDER BY date_mesure";
        $conso = $this->executerRequete($sql);
        return $conso;
    }

    /**
     * return consommation journalière entre date de début et de fin
     *
     * @param $startDate
     * @param $endDate
     * @return PDOStatement
     */
    public function calcConso($startDate, $endDate){
        $sql = "SELECT DATE_FORMAT(date_mesure, '%W %d/%m/%y') AS date, valeur_litres FROM consommation_eau WHERE date_mesure>=? AND date_mesure<=?";
        $consos = $this->executerRequete($sql, array($startDate, $endDate));
        return $consos;
    }

    /**
     * return la consommation du dernier jour
     *
     * @return mixed
     */
    public function calcConsoTotaleDernierJour(){
        $sql = "SELECT SUM(valeur_litres) AS tot FROM consommation_eau WHERE date_mesure >= DATE_SUB(CURDATE(), INTERVAL 1 DAY);";
        $consoTotDernierJour = $this->executerRequete($sql);
        return $consoTotDernierJour->fetch();
    }
}