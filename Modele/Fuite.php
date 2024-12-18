<?php 

require_once 'Modele/Modele.php';

class Fuite extends Modele {
	public function getFuites() {
        $sql = 'SELECT f.id_fuite, f.description, f.date_signalement, c.emplacement, f.statut FROM fuites_eau AS f JOIN capteurs_eau AS c ON f.id_capteur = c.id_capteur;';
        $fuites = $this->executerRequete($sql);
        return $fuites;
    }
	
	public function editStatutFuite($id_fuite) {
		$sql = 'SELECT f.statut FROM fuites_eau AS f WHERE f.id_fuite=?';
		$statut = $this->executerRequete($sql,array($id_fuite));
		if($statut){
			$sql = 'UPDATE fuites_eau SET statut = 0 WHERE id_fuite=?';
		}
		else {
			$sql = 'UPDATE fuites_eau SET statut = 1 WHERE id_fuite=?';
		}
		$statut = $this->executerRequete($sql,array($id_fuite));
	}
}