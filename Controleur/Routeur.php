
<?php

//require_once 'Controleur/ControleurExemple.php';
require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurCapteurs.php';
require_once 'Controleur/ControleurConso.php';

class Routeur {

    //private $ctrlExemple;
    private $ctrlAccueil;
    private $ctrlCapteurs;
    private $ctrlConso;

    public function __construct() {
        //$this->ctrlExemple = new ControleurExemple();
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlCapteurs = new ControleurCapteurs();
        $this->ctrlConso = new ControleurConso();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action']=='capteurs') {
					$this->ctrlCapteurs->listCapteurs();
                    exit();
				}
                if ($_GET['action'] == 'change'){
                    $idCapteur = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlCapteurs->changeCapteurs($idCapteur);
                    exit();
                }
                if ($_GET['action'] == 'del'){
                     $idCapteur = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlCapteurs->deleteCapteurs($idCapteur);
                    exit();
                }
                if ($_GET['action'] == "conf"){
                    $emplacement = strip_tags(trim($this->getParametre($_POST, 'emplacement')));
                    $valeur = strip_tags(trim($this->getParametre($_POST, 'valeur')));
                    $idCapteur = intval($this->getParametre($_POST, 'id'));
                    $this->ctrlCapteurs->modifCapteurs($idCapteur, $emplacement, $valeur);
                    exit();
                }
                if ($_GET['action'] == 'conso'){
                    $this->ctrlConso->showConso();
                    exit();
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
