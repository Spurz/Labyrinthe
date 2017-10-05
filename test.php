<?php
    $iMaVariable = 0;

    $iMaVariable = $iMaVariable +1;

    $sEncoreUneVariable = 'Hello les gens';
    $sMaPhrase = 'Coucou'.$sEncoreUneVariable. "Bonjourno";

    /* pour le debug */
    echo "coucou";
    var_dump($sMaPhrase);

    require_once("MonObjet.class.php");
    $i = 0;
    $j = 0;

    
    MonObjet::maMethodeStatique();
    //Constructeur
    $oMonObjet = new MonObjet($i,$j);
    // fonction publique
    $oMonObjet->maFonctionPublique();

?>

