
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
                    exit();
				}
				else if($_GET['action']=='fuite'){
					if(isset($_GET['id'])) {
						$this->ctrlFuite->fuite($_GET['id']);
                        exit();
					}
					else {
						throw new Exception("Pas d'id");
					}
				}
				else if($_GET['action']=='edit_fuite'){
					if(isset($_POST['statut'])){
						$this->ctrlFuite->edit_fuite($_GET['id'],'1');
                        exit();
					}
					else {
						$this->ctrlFuite->edit_fuite($_GET['id'],'0');
                        exit();
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
                if ($_GET['action'] == 'changeconso'){
                    if($_POST['showButton']){
<<<<<<< HEAD
                        if (empty($_POST['start-date'])){
                            $startDate = htmlspecialchars($_POST['start-date']);
=======
                        if (!empty($_POST['start-date'])){
                            $startDate = $_POST['start-date'];
>>>>>>> 4a1118598167b711fefd01f80fc6a96a1874ab47
                        }else {
                            $erreur['start-date'] = true;
                        }
                        if (!empty($_POST['end-date'])){
<<<<<<< HEAD
                            $endDate = htmlspecialchars($_POST['end-date']);
=======
                            $endDate =$_POST['end-date'];
>>>>>>> 4a1118598167b711fefd01f80fc6a96a1874ab47
                        }else {
                            $erreur['end-date'] = true;
                        }
                        if (empty($erreur)){
                            $this->ctrlConso->changeConso($startDate, $endDate);

                        }
                        else {
                            $this->ctrlConso->showConso();
                        }
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
