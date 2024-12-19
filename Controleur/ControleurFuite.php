<?php

require_once 'Modele/Fuite.php';
require_once 'Vue/Vue.php';

/**
 * Classe responsable de la gestion des données relatives a une fuite spécifique,
 * ainsi qu'à la modification du statut de cette fuite.
 */
class ControleurFuite {
	
	private $fuite;

    public function __construct() {
		$this->fuite = new Fuite();
			
    }

    /**
     * récupère informations sur une fuite spécifique et génère vue appropriée
     *
     * @param $id_fuite : id fuite à afficher
     * @return void
     */
	public function fuite($id_fuite){
		$données = $this->fuite->getFuite($id_fuite);
        $vue = new Vue("Fuite");
        $vue->generer(array('fuites' => $données));
    }

    /**
     * change le statut d'une fuite
     *
     * @param $id_fuite : id fuite à modifier
     * @param $value : 0 -> en attente, 1 -> résolue
     * @return void
     */
	public function edit_fuite($id_fuite,$value){
		$this->fuite->editStatutFuite($id_fuite, $value);
		$this->fuite($id_fuite);
    }

}
