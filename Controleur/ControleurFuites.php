<?php

require_once 'Modele/Fuite.php';		
require_once 'Vue/Vue.php';

/**
 * Classe responsable de la gestion des données relatives aux fuites,
 * ainsi qu'à leur affichage via les vues appropriées.
 */
class ControleurFuites {
	
	private $fuite;

    public function __construct() {
		$this->fuite = new Fuite();
			
    }

    /**
     * récupère informations fuites et génère vue avec
     *
     * @return void
     */
	public function fuites(){
		$données = $this->fuite->getFuites();
        $vue = new Vue("Fuites");
        $vue->generer(array('fuites' => $données));
    }
}
