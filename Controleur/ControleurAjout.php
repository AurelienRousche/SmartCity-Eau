<?php
require_once 'Vue/Vue.php';
require_once "Modele/Capteur.php";

class ControleurAjout {
	public function ajout(){
      $vue = new Vue("Ajout");
	  $vue->generer(array());
    }
}