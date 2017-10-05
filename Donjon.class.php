<?php

require_once("LabyrintheDefaut.class.php");

Class Donjon extends LabyrintheDefaut {
    
    private $idDonjon;
    private $nomDonjon;
    

    public function __construct($idDonjon,$nomDonjon){
        $Connexion = $this->getConnexion();
        $sAllDonjon = "Select id_donjon, nom_donjon from donjon where id_donjon".$idDonjon;
        $oResult = $oConnexion->query($sAllDonjon);

        $aResult = $aResult->fetch();
        var_dump($aResult)
        if(!empty($aResult)) {
            throw new Exception();
        }
        $this->idDonjon = $idDonjon;
        $this->nomDonjon = $nomDonjon['nom_donjon'];
        
    }

    public static function AllDonjon (){
            $Connexion = self::getConnexion();
            $sListeDonjons = "SELECT id_donjon from donjon order by nom_donjon";
            $oResult = $Connexion->query($sListeDonjons);

            $aDonjons = array();
            foreach ($oResult as $aRow){
            $aDonjons[] = new Donjon($aRow['id_donjon']);
            }
            return $aDonjons;
    }

    public function GetnomDonjon(){
        return $this->nomDonjon;
    }

    public function SetnomDonjon($nomDonjon){
        $Connexion = self::getConnexion();
        $req2 = "UPDATE donjon SET nom_donjon = '".$nomDonjon."' Where id_donjon".this->idDonjon;
        
        $this->nomDonjon = $nomDonjon; 
    }
        
}