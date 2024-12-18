<?php

require_once 'Vue/Vue.php';
require_once "Modele/Capteur.php";

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

    public function changeCapteurs($idCapteur){
      $currentCapteur = $this->capteur->getCapteur($idCapteur);
      $vue = new Vue("Change");
      $vue->generer(array('currentCapteur' => $currentCapteur));
    }

    public function deleteCapteurs($idCapteur){
      $this->capteur->deleteCapteur($idCapteur);
      $capteurs = $this->capteur->listerCapteurs();
      $vue = new Vue("Capteurs");
      $vue->generer(array('capteurs' => $capteurs));
    }

    public function modifCapteurs($idCapteur, $emplacement, $valeur){
      $this->capteur->modifCapteurs($idCapteur, $emplacement, $valeur);
      $capteurs = $this->capteur->listerCapteurs();
      $vue = new Vue("Capteurs");
      $vue->generer(array( 'capteurs' => $capteurs));
    }
}

