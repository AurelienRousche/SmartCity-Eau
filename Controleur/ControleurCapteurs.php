<?php

require_once 'Vue/Vue.php';
require_once "Modele/Capteur.php";

/**
 * Cette classe agit comme un contrôleur pour la gestion des capteurs dans l'application.
 * Elle assure les opérations de lecture, modification, suppression et ajout de capteurs,
 * et génère les vues appropriées.
 */
class ControleurCapteurs {

    private $capteur;

    public function __construct() {
		$this->capteur = new Capteur();
    }

    /**
     * Récupère liste capteurs et génère vue avec
     *
     * @return void
     */
	public function listCapteurs(){
        $capteurs = $this->capteur->listerCapteurs();
        $vue = new Vue("Capteurs");
        $vue->generer(array('capteurs' => $capteurs));
    }

    /**
     * génère vue change qui permet de modifier les capteurs
     *
     * @param $idCapteur : id du capteur à modifer
     * @return void
     */
    public function changeCapteurs($idCapteur){
      $currentCapteur = $this->capteur->getCapteur($idCapteur);
      $vue = new Vue("Change");
      $vue->generer(array('currentCapteur' => $currentCapteur));
    }

    /**
     * efface capteur dans base de données
     *
     * @param $idCapteur : id du capteur à effacer
     * @return void
     */
    public function deleteCapteurs($idCapteur){
      $this->capteur->deleteCapteur($idCapteur);
      $this->listCapteurs();
    }

    /**
     * modifie capteur dans base de données
     *
     * @param $idCapteur : id du capteur à modifier
     * @param $emplacement : nouvelle addresse du capteur
     * @param $valeur : nouvelle valeur du capteur (désactivé pour capteur de type fuite
     * @return void
     */
    public function modifCapteurs($idCapteur, $emplacement, $valeur){
      $this->capteur->modifCapteurs($idCapteur, $emplacement, $valeur);
      $this->listCapteurs();
    }

    /**
     * ajoute capteur dans base de données
     *
     * @param $emplacement : addresse du capteur
     * @param $type : type du capteur (consommation ou fuite)
     * @return void
     */
	public function ajouterCapteurs($emplacement, $type){
	  $this->capteur->ajoutCapteurs($emplacement, $type	);
      $this->listCapteurs();
	}

}

