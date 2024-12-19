<?php

require_once "Modele/Modele.php";

class Conso extends Modele {
    public function consoDernierJour(){
        $sql = "SELECT DATE_FORMAT(date_mesure, '%W %d-%m-%y') AS date, valeur_litres FROM consommation_eau ORDER BY date_mesure";
        $conso = $this->executerRequete($sql);
        return $conso;
    }

    public function calcConso($startDate, $endDate){
        $sql = "SELECT DATE_FORMAT(date_mesure, '%W %d/%m/%y') AS date, valeur_litres FROM consommation_eau WHERE date_mesure>=? AND date_mesure<=?";
        $consos = $this->executerRequete($sql, array($startDate, $endDate));
        return $consos;
    }

    public function calcConsoTotaleDernierJour(){
        $sql = "SELECT SUM(valeur_litres) AS tot FROM consommation_eau WHERE date_mesure >= DATE_SUB(CURDATE(), INTERVAL 1 DAY);";
        $consoTotDernierJour = $this->executerRequete($sql);
        return $consoTotDernierJour->fetch();
    }
}