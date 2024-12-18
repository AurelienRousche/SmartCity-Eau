<?php

require_once 'Vue/Vue.php';
require_once "Modele/Conso.php";

class ControleurConso {

    private $conso;

    public function __construct(){
        $this->conso = new Conso();
    }

    public function showConso(){
        $consos = $this->conso->consoDernierJour();
        $vue = new Vue("Conso");
        $vue->generer(array('conso' => $consos));
    }
}