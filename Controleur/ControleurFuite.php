<?php

require_once 'Modele/Fuite.php';
require_once 'Vue/Vue.php';

class ControleurFuite {
	
	private $fuite;

    public function __construct() {
		$this->fuite = new Fuite();
			
    }
<<<<<<< Updated upstream

// Affiche la liste de tous les billets du blog
	public function fuite(){
		$fuites = $this->fuite->getFuites();
        $vue = new Vue("Fuites");
        $vue->generer(array('fuites' => $fuites));
=======
// Affiche la liste de tous les billets du blog
	public function fuite($id_fuite){
		$données = $this->fuite->getFuite($id_fuite);
        $vue = new Vue("Fuite");
        $vue->generer(array('fuites' => $données));
    }
	
	public function edit_fuite($id_fuite,$value){
		$this->fuite->editStatutFuite($id_fuite,$value);
		$this->fuite($id_fuite);
>>>>>>> Stashed changes
    }

}
