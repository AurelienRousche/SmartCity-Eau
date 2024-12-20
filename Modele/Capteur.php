<?php

require_once "Modele/Modele.php";

/**
 * Classe permettant de communiquer avec la table 'capteurs_eau' de la base de données
 */
class Capteur extends Modele {

    /**
     * compte et return le nombre de capteurs dans la bd
     *
     * @return PDOStatement
     */
    public function countCapteurs(){
        $sql = "SELECT COUNT(id_capteur) AS nbr_capteur FROM `capteurs_eau`";
        $capteurs = $this->executerRequete($sql);
        return $capteurs->fetch();
    }

    /**
     * return toutes les informations de tout les capteurs de la db
     *
     * @return PDOStatement
     */
    public function listerCapteurs(){
        $sql = "SELECT * FROM capteurs_eau";
        $capteurs = $this->executerRequete($sql);
        return $capteurs;
    }

    /**
     * return informations liées à un capteur spécifique
     *
     * @param $idCapteur
     * @return mixed
     * @throws Exception : si aucun capteur avec l'id spécifiée n'existe
     */
    public function getCapteur($idCapteur){
        $sql = "SELECT * FROM capteurs_eau WHERE id_capteur=?";
        $capteur = $this->executerRequete($sql, array($idCapteur));
        if ($capteur->rowCount() > 0){
            return $capteur->fetch();
        }
        else {
            throw new Exception("Aucun capteur avec l'id : ", $idCapteur);
        }
    }

    public function deleteCapteur($idCapteur){
        $sql = "DELETE FROM fuites_eau WHERE id_capteur=?; DELETE FROM capteurs_eau WHERE id_capteur=?";
        $this->executerRequete($sql, array($idCapteur, $idCapteur));
    }

    public function modifCapteurs($idCapteur, $emplacement, $valeur){
        $sql = "UPDATE capteurs_eau SET emplacement=?, valeur=? WHERE id_capteur=?";
        $this->executerRequete($sql, array($emplacement, $valeur, $idCapteur));
    }
	
	public function ajoutCapteurs($emplacement, $type_capteur){
        $sql = "INSERT INTO capteurs_eau (emplacement, valeur, type_capteur) VALUES (?, 0, ?)";
        $this->executerRequete($sql, array($emplacement, $type_capteur));
    }
}