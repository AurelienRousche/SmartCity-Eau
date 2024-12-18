<?php 

require_once 'Modele/Modele.php';

class Fuite extends Modele {
	public function getFuites() {
        $sql = 'SELECT f.id_fuite, f.description, f.date_signalement, c.emplacement, f.statut FROM fuites_eau AS f JOIN capteurs_eau AS c ON f.id_capteur = c.id_capteur;';
        $fuites = $this->executerRequete($sql);
        return $fuites;
    }
	
	public function getFuite($id_fuite) {
        $sql = 'SELECT f.id_fuite, f.description, f.date_signalement, c.emplacement, f.statut FROM fuites_eau AS f JOIN capteurs_eau AS c ON f.id_capteur = c.id_capteur WHERE f.id_fuite=?;';
        $fuites = $this->executerRequete($sql,array($id_fuite));
        return $fuites;
    }
	
	public function editStatutFuite($id_fuite,$value) {
		$sql = 'UPDATE fuites_eau SET statut = ? WHERE id_fuite=?';
		$req = $this->executerRequete($sql,array($value,$id_fuite));
	}
}