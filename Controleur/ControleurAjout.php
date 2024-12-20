<?php
require_once 'Vue/Vue.php';
require_once "Modele/Capteur.php";

/**
 * Controleur responsable de la géneration d'une vue Ajout.
 */
class ControleurAjout {

    /**
     * Méthode qui initialise et génère une vue pour l'ajout.
     *
     * @return void
     */
	public function ajout(){
      $vue = new Vue("Ajout");
	  $vue->generer(array());
    }
}