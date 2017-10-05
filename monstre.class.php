<?php
require_once('LabyrDefaut.class.php');

class Monstre extends LabyrintheDefaut{
  private $_iIdMonstre;
  private $_sNomMonstre;
  private $_iPdvMonstre;

}

public function __construct($iIdMonstre) {
  $oConnexion = self::getConnexion();
  $sMonstre = "SELECT id_monstre, nom_monstre, pdv_monstre FROM monstre WHERE id_monstre = ".$iIdMonstre;
  $oResult = $oConnexion->query($sMonstre);

  $aResult = $oResult->fetch();
  if (empty($aResult)) {
    throw new Exception("Le monstre n'existe pas.");
  }
  $this->_iIdMonstre = $iIdMonstre;
  $this->_sNomMonstre = $aResult['nom_monstre'];
  $this->_iPdvMonstre = $aResult['pdv_monstre'];
}

public static function creerMonstre($sNomMonstre, $iPdvMonstre){
  $oConnexion = self::getConnexion();
  $reqMonstre = $oConnexion->prepare("INSERT INTO monstre VALUES (NULL, ?, ?)");
  $reqMonstre->execute(array($sNomMonstre, $iPdvMonstre));
  $iIdMonstre = $oConnexion->lastInsertId();
  return new monstre($iIdMonstre);
}

public function Combattre($iPdvMonstre,iPdvPerso){
  $oConnexion = self::getConnexion();
  $Nombre = rand(0,100)
  
  if($Nombre < 40){
    echo "Monstre gagné";
    $req = "UPDATE Parcours SET monstre_tue_parcour = '1'"
  } 
  else {
    echo "Perso gagné";
  }
  For
}



