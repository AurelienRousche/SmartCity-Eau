
<?php

//require_once 'Controleur/ControleurExemple.php';
require_once 'Controleur/ControleurFuites.php';
require_once 'Controleur/ControleurFuite.php';
require_once 'Vue/Vue.php';
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurCapteurs.php';
require_once 'Controleur/ControleurConso.php';

class Routeur {

    //private $ctrlExemple;
    private $ctrlAccueil;
    private $ctrlFuites;
    private $ctrlFuite;
    private $ctrlCapteurs;
    private $ctrlConso;

    public function __construct() {
        //$this->ctrlExemple = new ControleurExemple();
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlFuites = new ControleurFuites();
        $this->ctrlFuite = new ControleurFuite();
        $this->ctrlCapteurs = new ControleurCapteurs();
        $this->ctrlConso = new ControleurConso();
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
                else if ($_GET['action']=='capteurs') {
					$this->ctrlCapteurs->listCapteurs();
                    exit();
				}
               else if ($_GET['action'] == 'change'){
                    $idCapteur = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlCapteurs->changeCapteurs($idCapteur);
                    exit();
                }
                else if ($_GET['action'] == 'del'){
                     $idCapteur = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlCapteurs->deleteCapteurs($idCapteur);
                    exit();
                }
               else if ($_GET['action'] == "conf"){
                    $emplacement = strip_tags(trim($this->getParametre($_POST, 'emplacement')));
                    $valeur = strip_tags(trim($this->getParametre($_POST, 'valeur')));
                    $idCapteur = intval($this->getParametre($_POST, 'id'));
                    $this->ctrlCapteurs->modifCapteurs($idCapteur, $emplacement, $valeur);
                    exit();
                }
                else if ($_GET['action'] == 'conso'){
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
