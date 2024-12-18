<?php

require_once "Modele/Modele.php";

class Conso extends Modele {
    public function consoDernierJour(){
        $sql = "SELECT  DATE_FORMAT(date_mesure, '%W''%d') AS date, valeur_litres FROM consommation_eau ORDER BY date_mesure";
        $conso = $this->executerRequete($sql);
        return $conso;
    }
}