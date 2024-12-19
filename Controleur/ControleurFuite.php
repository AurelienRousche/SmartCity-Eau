<?php

require_once 'Modele/Fuite.php';
require_once 'Vue/Vue.php';

class ControleurFuite {
	
	private $fuite;

    public function __construct() {
		$this->fuite = new Fuite();
			
    }
// Affiche la liste de tous les billets du blog
	public function fuite($id_fuite){
		$données = $this->fuite->getFuite($id_fuite);
        $vue = new Vue("Fuite");
        $vue->generer(array('fuites' => $données));
    }
	
	public function edit_fuite($id_fuite,$value){
		$this->fuite->editStatutFuite($id_fuite, $value);
		$this->fuite($id_fuite);
    }

}
