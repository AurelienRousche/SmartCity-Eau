<?php

require_once "Modele/Capteur.php";
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $capteur;

    public function __construct() {
		$this->capteur = new Capteur();
    }

// Affiche la liste de tous les billets du blog
	public function accueil(){
        $capteurs = $this->capteur->countCapteurs();
        $fuites = $this->capteur->countFuites();
        $vue = new Vue("Accueil");
        $vue->generer(array('capteurs' => $capteurs, 'fuites' => $fuites));
    }

}

