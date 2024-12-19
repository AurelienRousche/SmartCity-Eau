<?php

require_once "Modele/Capteur.php";
require_once "Modele/Fuite.php";
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $capteur;
    private $fuite;

    public function __construct() {
		$this->capteur = new Capteur();
		$this->fuite = new Fuite();
    }

// Affiche la liste de tous les billets du blog
	public function accueil(){
        $capteurs = $this->capteur->countCapteurs();
        $fuites = $this->fuite->countFuites();
        $vue = new Vue("Accueil");
        $vue->generer(array('capteurs' => $capteurs, 'fuites' => $fuites));
    }

}

