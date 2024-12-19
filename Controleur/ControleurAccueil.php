<?php

require_once "Modele/Capteur.php";
require_once "Modele/Conso.php";
require_once "Modele/Fuite.php";
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $capteur;
    private $conso;
    private $fuite;

    public function __construct() {
		$this->capteur = new Capteur();
    $this->conso = new Conso();
		$this->fuite = new Fuite();
    }

// Affiche la liste de tous les billets du blog
	public function accueil(){
        $capteurs = $this->capteur->countCapteurs();
        $consoTot = $this->conso->calcConsoTotaleDernierJour();
        $fuites = $this->fuite->countFuites();
        $vue = new Vue("Accueil");
        $vue->generer(array('capteurs' => $capteurs, 'fuites' => $fuites, 'consoTot' => $consoTot));
    }

}

