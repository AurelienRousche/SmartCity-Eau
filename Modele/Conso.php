<?php

require_once "Modele/Modele.php";

class Conso extends Modele {
    public function consoDernierJour(){
        $sql = "SELECT SUM(valeur_litres) AS valeur FROM consommation_eau WHERE date_mesure >= '2024-06-15 12:00:00' AND date_mesure <= '2024-06-19 12:00:00'";
        $conso = $this->executerRequete($sql);
        return $conso;
    }
}