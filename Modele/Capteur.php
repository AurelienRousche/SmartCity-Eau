<?php

require_once "Modele/Modele.php";

class Capteur extends Modele {
    public function listerCapteurs(){
        $sql = "SELECT COUNT(id_capteur) AS nbr_capteur, SUM(valeur) AS conso_tot FROM `capteurs_eau` WHERE valeur > 0;";
        $sensors = $this->executerRequete($sql);
        return $sensors;
    }
}