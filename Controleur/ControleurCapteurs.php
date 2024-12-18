<?php

require_once "Modele/Capteur.php";
require_once 'Vue/Vue.php';

class ControleurCapteurs {

    private $capteur;

    public function __construct() {
		$this->capteur = new Capteur();
    }

// Affiche la liste de tous les billets du blog
	public function listCapteurs(){
        $capteurs = $this->capteur->listerCapteurs();
        $vue = new Vue("Capteurs");
        $vue->generer(array('capteurs' => $capteurs));
    }

}

