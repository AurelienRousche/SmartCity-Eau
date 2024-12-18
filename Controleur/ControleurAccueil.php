<?php

require_once 'Vue/Vue.php';
require_once "Modele/Capteur.php";

class ControleurAccueil {

    private $capteur;

    public function __construct() {
		$this->capteur = new Capteur();
    }

// Affiche la liste de tous les billets du blog
	public function accueil(){
        $capteur = $this->capteur->listerCapteurs();
        $vue = new Vue("Accueil");
        $vue->generer(array(array('capteur' => $capteur)));
    }

}

