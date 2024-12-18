<?php

require_once 'Modele/Fuite.php';
require_once 'Vue/Vue.php';

class ControleurFuite {
	
	private $fuite;

    public function __construct() {
		$this->fuite = new Fuite();
			
    }

// Affiche la liste de tous les billets du blog
	public function fuite(){
		$fuites = $this->fuite->getFuites();
        $vue = new Vue("Fuites");
        $vue->generer(array('fuites' => $fuites));
    }

}
