<?php
require_once('LabyrDefaut.class.php');

class Personnage extends LabyrintheDefaut{
  private $_iIdPerso;
  private $_sNomPerso;
  private $_iPdvPerso;

  /**
    * @param integer $iIdPerso Identifiant du personnage
    * @constructor
  */
  public function __construct($iIdPerso) {
    $oConnexion = self::getConnexion();
    $sPersonnage = "SELECT id_perso, nom_perso, pdv_perso FROM personnage WHERE id_perso = ".$iIdPerso;
    $oResult = $oConnexion->query($sPersonnage);

    $aResult = $oResult->fetch();
    if (empty($aResult)) {
      throw new Exception("Le personnage n'existe pas.");
    }
    $this->_iIdPerso = $iIdPerso;
    $this->_sNomPerso = $aResult['nom_perso'];
    $this->_iPdvPerso = $aResult['pdv_perso'];
  }

  /**
  * Retourne la liste des personnages
  *
  * @return personnage[] Liste des personnages
  */
  public static function all(){
    $oConnexion = self::getConnexion();
    $sListePersonnages = "SELECT id_perso, nom_perso FROM personnage ORDER BY nom_perso";
    $oResult = $oConnexion->query($sListePersonnages);
    $aPersonnage = array();
    foreach ($oResult as $aRow) {
      $aPersonnage[] = new personnage($aRow['id_perso']);
    }
    return $aPersonnage;
  }

  /**
  * @return String Nom du personnage
  */
  public function getNomPerso(){
    return $this->_sNomPerso;
  }

  /**
  * @return Integer Id du personnage
  */
  public function getIdPerso(){
    return $this->_iIdPerso;
  }

  /**
  * @return Integer Point de vie du personnage
  */
  public function getPdvPerso(){
    return $this->_iPdvPerso;
  }

  /**
  * Change le nom du personnage
  *
  * @param String $sNomPerso Nom du personnage
  */
  public function setNomPerso($sNomPerso){
    $oConnexion = self::getConnexion();
    $stmt = $oConnexion->prepare("UPDATE personnage SET nom_perso = ? WHERE id_perso = ?");
    $stmt->execute(array($sNomPerso, $this->_iIdPerso));
    $this->_sNomPerso = $sNomPerso;
  }

    /**
  * Change le nombre de point de vie du personnage
  *
  * @param String $iPdvPerso Points de vie du personnage
  */
  public function setPdvPerso($iPdvPerso){
    $oConnexion = self::getConnexion();
    $stmt = $oConnexion->prepare("UPDATE personnage SET pdv_perso = ? WHERE id_perso = ?");
    $stmt->execute(array($iPdvPerso, $this->_iIdPerso));
    $this->_iPdvPerso = $iPdvPerso;
  }

  /**
  * Créer un personnage et le retourne
  *
  * @return personnage Le personnage qui vient d'être créé
  */
  public static function creerPerso($sNomPerso, $iPdvPerso){
    $oConnexion = self::getConnexion();
    $stmt = $oConnexion->prepare("INSERT INTO personnage VALUES (NULL, ?, ?)");
    $stmt->execute(array($sNomPerso, $iPdvPerso));
    $iIdPerso = $oConnexion->lastInsertId();
    return new personnage($iIdPerso);
  }

  

  public function PlacerPerso(){
    $oConnexion = self::getConnexion();
    $reqPperso = "SELECT id_piece, entree_piece, sortie_piece from piece where id_piece = ?";
    $oResult = $oConnexion->query($reqPperso);

  }
}