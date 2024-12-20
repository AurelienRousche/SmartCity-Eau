<?php 

require_once 'Modele/Modele.php';

/**
 * Classe permettant de communiquer avec la table 'fuites_eau' de la base de données
 */
class Fuite extends Modele {

    /**
     * return informations sur l'entiereté des fuites présentes dans la db
     *
     * @return PDOStatement
     */
	public function getFuites() {
        $sql = 'SELECT f.id_fuite, f.description, f.date_signalement, c.emplacement, f.statut FROM fuites_eau AS f JOIN capteurs_eau AS c ON f.id_capteur = c.id_capteur;';
        $fuites = $this->executerRequete($sql);
        return $fuites;
    }

    /**
     * return informations liées à une fuite spécifique
     *
     * @param $id_fuite
     * @return PDOStatement
     */
	public function getFuite($id_fuite) {
        $sql = 'SELECT f.id_fuite, f.description, f.date_signalement, c.emplacement, f.statut FROM fuites_eau AS f JOIN capteurs_eau AS c ON f.id_capteur = c.id_capteur WHERE f.id_fuite=?;';
        $fuites = $this->executerRequete($sql,array($id_fuite));
        return $fuites;
    }

    /**
     * édite le statut d'une fuite
     *
     * @param $id_fuite
     * @param $value : 0 ou 1
     * @return void
     */
	public function editStatutFuite($id_fuite,$value) {
		$sql = 'UPDATE fuites_eau SET statut = ? WHERE id_fuite=?';
		$req = $this->executerRequete($sql,array($value,$id_fuite));
	}

    /**
     * return le nombre de fuites présente dans la db
     *
     * @return mixed
     */
    public function countFuites(){
        $sql = "SELECT COUNT(id_fuite) AS nbr_fuites FROM fuites_eau";
        $nbrFuites = $this->executerRequete($sql);
        return $nbrFuites->fetch();
    }
}