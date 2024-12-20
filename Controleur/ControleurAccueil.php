<?php

require_once "Modele/Capteur.php";
require_once "Modele/Conso.php";
require_once "Modele/Fuite.php";
require_once 'Vue/Vue.php';

/**
 * Cette classe est responsable de la génération de la page d'accueil en récupérant des données
 * liées aux capteurs, à la consommation et aux fuites, puis en générant la vue correspondante.
 */
class ControleurAccueil {

    private $capteur;
    private $conso;
    private $fuite;

    public function __construct() {
		$this->capteur = new Capteur();
    $this->conso = new Conso();
		$this->fuite = new Fuite();
    }

    /**
     * Calcule les données à afficher et génère la vue Accueil aves les données récupérées.
     *
     * @return void
     */
	public function accueil(){
        $capteurs = $this->capteur->countCapteurs();
        $consoTot = $this->conso->calcConsoTotaleDernierJour();
        $fuites = $this->fuite->countFuites();
        $vue = new Vue("Accueil");
        $vue->generer(array('capteurs' => $capteurs, 'fuites' => $fuites, 'consoTot' => $consoTot));
    }

}

