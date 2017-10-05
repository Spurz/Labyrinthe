<?php
//stdClass

class MonObjet{
    private $_iMonEntier;

    public $_iMonEntierPublic = 66;

    /**
    *   @param string $sMonParam Un bien jolie paramètre
    *   @constructor
    */

    public function __construct($sMonParam,&$sMonParam){
        $this ->$_iMonEntier = 0;
        $this ->$_iMonEntierPublic =1;
    } 

    public static function maMethodeStatique (){
        $MonJoliTableau = array();
        $aMonJoliTableau [0] = "premiere valeur";
        $aMonJoliTableau["indice"] = "une autre valeur";
    }

    private function maMethodePrivee(){
        $this->iMonEntier++;
    }

    /**
    *   Fonction qui sert à rien
    *   @return string
    */

    public function MaFonctionPublique(){
        return "Coucou";
    }
        
}

?>
