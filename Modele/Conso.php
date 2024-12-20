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
    public function consoDernierJourQuartier(){
        $sql = "SELECT SUM(valeur_litres) AS conso_dernier_jour, quartier FROM consommation_eau WHERE date_mesure >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) GROUP BY quartier";
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
        $sql = "SELECT SUM(valeur_litres) AS conso_dates, quartier FROM consommation_eau WHERE date_mesure>=? AND date_mesure<=? GROUP BY quartier";
        $consos = $this->executerRequete($sql, array($startDate, $endDate));
        return $consos;
    }

    /**
     * return la consommation du dernier jour
     *
     * @return mixed
     */
    public function calcConsoTotaleDernierJour(){
        $sql = "SELECT SUM(valeur_litres) AS tot FROM consommation_eau WHERE date_mesure >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
        $consoTotDernierJour = $this->executerRequete($sql);
        return $consoTotDernierJour->fetch();
    }
}