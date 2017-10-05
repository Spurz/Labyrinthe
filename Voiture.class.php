<?php

    Class Voiture {

        private $iNbplaces;
        private $iMoteur;

        public function __construct($iNbplaces,$iCVMoteur){
            $this ->iNbplaces = $iNbplaces;
            $this ->iMoteur = $iCVMoteur;
        }

        public function Avancer(){
            echo "gg";
        }

        public function Reculer(){
            echo "pp";
        }

        public function Freiner(){
            echo "lala";
        }
    }
?>

