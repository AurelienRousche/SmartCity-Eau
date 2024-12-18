<?php

//require_once 'Controleur/ControleurExemple.php';
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurFuites.php';
require_once 'Controleur/ControleurFuite.php';
require_once 'Vue/Vue.php';
class Routeur {

    //private $ctrlExemple;
    private $ctrlAccueil;
    private $ctrlFuites;
    private $ctrlFuite;

    public function __construct() {
        //$this->ctrlExemple = new ControleurExemple();
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlFuites = new ControleurFuites();
        $this->ctrlFuite = new ControleurFuite();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action']=='fuites') {
					$this->ctrlFuites->fuites();
				}
				else if($_GET['action']=='fuite'){
					if(isset($_GET['id'])) {
						$this->ctrlFuite->fuite($_GET['id']);
					}
					else {
						throw new Exception("Pas d'id");
					}
				}
				else if($_GET['action']=='edit_fuite'){
					if(isset($_POST['statut'])){
						$this->ctrlFuite->edit_fuite($_GET['id'],'1');
					}
					else {
						$this->ctrlFuite->edit_fuite($_GET['id'],'0');
					}
				}
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
