<?php

require_once 'Vue/Vue.php';
require_once "Modele/Conso.php";

/**
 * Classe responsable de la gestion des données relatives à la consommation,
 * ainsi qu'à leur affichage via les vues appropriées.
 */
class ControleurConso {

    private $conso;

    public function __construct(){
        $this->conso = new Conso();
    }

    /**
     * recherche consommation du dernier jour et l'affiche
     *
     * @return void
     */
    public function showConso(){
        $consos = $this->conso->consoDernierJourQuartier();
        $vue = new Vue("Conso");
        $vue->generer(array('conso' => $consos));
    }

    /**
     * recherche et affiche consommation entre $starDate et $endDate
     *
     * @param $startDate : date de début
     * @param $endDate : date de fin
     * @return void
     */
    public function changeConso($startDate, $endDate){
        $consos = $this->conso->calcConso($startDate, $endDate);
        $vue = new Vue("Conso");
        $vue->generer(array('consosDates'=>$consos));
    }
}