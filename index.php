<?php

require 'flight/Flight.php';

/*
Flight::route('/', function(){
    echo 'hello world!';
  });
*/

require 'Donjon.class.php';

Flight::route('/ping', function(){
  echo 'pong';
  });

Flight::route('GET /donjons',function(){
  $oDonjon = new Donjon(1);
  $oDonjon->setNomDonjon('Mon joli Donjon');
  echo "Mon donjon lalala ".$oDonjon->getNomDonjon()."<br>";
  $oDonjon->setNomDonjon('lallalal');

  $aListeDonjon = Donjon::AllDonjons();
    foreach(aListeDonjon as aDonjon){
      echo $nomDonjon -> getNomDonjon;
    }
  });


  Flight::route('POST /perso', function(){
    
      if (!isset(Flight::request()->data->nom_perso)) Flight::halt(406, "Il manque le nom du personnage");
      if (!isset(Flight::request()->data->pdv_perso)) Flight::halt(406, "Il manque le nombre de point de vie du personnage");
      // Récupération des paramètres de la route
      // Flight::request()->data données en JSON mis sous forme d'Object
      // Exemple Flight::request()->data->pdv_perso
      $sNomPerso = Flight::request()->data->nom_perso;
      $iPdvPerso = Flight::request()->data->pdv_perso;
      // Création du personnage
      $oPerso = Perso::creerPerso($sNomPerso, $iPdvPerso);
    
      // retourne un JSON avec id_perso (depuis l'objet)
      // exemple : Flight::json(array('id_perso'=>42))
      Flight::json(
        array(
          'id_perso'=>
            $oPerso->getIdPerso()
        )
      );
    });


// entree du donjon 

Flight::route('POST /perso/@id_perso/donjon/@id_donjon', function($iPersoID,$iDonjonID){
  
      //Recuperer l'entree du donjon
      $oDonjon = new Donjon($iDonjonID);
      //Verifier via un count que le personnage n'est pas dans le donjon
      $iPieceID = $oDonjon->getEntree();

      $oPerso = new Perso ($iPerso);
      
      if($oPerso->dejaVisite($iPieceID)==true){
         Flight::halt(403,"Vous n'avez pas le droit d'accéder à cette pièce"); 
      }
      else(
          $oPerso->parcours($iPieceID);
      )

        //Inserer dans la table parcours le perso et la piece 



        //Resultat route
        Flight::json(array(
          
              "id_piece"=>56,
              "id_piece_possibles"=>array(89,43,52)
          ));
  });

  # Si il peut (vérifier la possibilité), le joueur entre dans une piece

  Flight::route('POST /perso/@id_perso/piece/@id_piece', function($iPerso,$iPiece){

    //Voir dans quelle piece est le personnage 
    $oPiece = new Piece ($iPiece);
    $oPerso = new Perso ($iPerso);

    //Verifier si la piece est passée en parametre 
    


    //Placer personnage dans la piece
    $iPerso = $oPerso->PlacerPerso();       
    });

  # Si l'utilisateur ouvre un coffre

  Flight::route('POST /perso/@id_perso/piece/@id_piece/coffre/@id_coffre/ouvrir', function($iPerso,$iPiece,$iCoffre){
    
    //Voir si un coffre (id_coffre) existe dans la piece
    $oCoffre = new Coffre ($iCoffre);
    $iPiece = $oCoffre => CoffreExist();

    //Verifier si le coffre a déja été ouvert
    if($oCoffre->dejaOuvert($iPerso)==true){
      Flight::halt(403,"Ce coffre à déja été ouvert"); 
    }
    else{
      $iPerso = $oPerso => OuvrirCoffre();
    } 

    //piéger oui/non
    $iCoffre = $oCoffre => getStatutPiege();

    //Tresor dans coffre oui/non
    $iCoffre = $oCoffre => getStatutTresor();

  });

  # Donne les informations sur le coffre

  Flight::route('GET /perso/@id_perso/piece/@id_piece/coffre/@id_coffre', function($iPerso,$iPiece,$iCoffre){
    
    // Coffre existant oui/non
    $iPiece = $oCoffre => CoffreExist();

    //retourner les infos du coffre
    $iCoffre = $oCoffre => getContenuCoffre();

  });

  # Si l'utilisateur choisi de combattre

  Flight::route('POST /perso/@id_perso/piece/@id_piece/monstre/@id_monstre/combattre', function($iPerso,$iPiece,$iMonstre){
    
    //Monstre existant oui/non
    $oMonstre = Monstre::creerMonstre($sNomMonstre, $iPdvMonstre);
    $oMonstre = new Monstre ($iMonstre);
    $oPerso = new Perso ($iPerso);
    $oPiece = new Piece ($iPiece);

    //Monstre deja combattu oui/non
    if($oMonstre->MonstreDejaCombattu($iPerso)==true){
      Flight::halt(403,"Vous vous êtes déjà battu contre ce monstre"); 
    }
    else{
      $iPiece = $oPiece => FaireApparaitreMonstre();
    } 
    
    //combattre
    $iMonstre = $oMonstre => MonstreAttaquePerso();
    $iPerso = $oPerso => PersoAttaqueMonstre();
  });

  # Si l'utilisateur fuit, on lui enlève des points de vie aléatoire entre 1 et 10 (si le temps ajouter + on fuit, + on perd)

  Flight::route('POST /perso/@id_perso/piece/@id_piece/monstre/@id_monstre/fuir', function($iPerso,$iPiece,$iMonstre){
    
    //Monstre existant oui/non
    $oMonstre = new Monstre ($iMonstre);

    //Monstre deja combattu oui/non
    if($oMonstre->dejaCombattu($iPerso)==true){
      Flight::halt(403,"Vous vous êtes déjà battu contre ce monstre"); 
    }
    else{
      $iPiece = $oPiece => FaireApparaitreMonstre();
    } 

    //fuir
    $iMonstre = $Perso => Fuir();
  });

  
  





//Creer 


Flight::start();
  

/*
$MaVoiture = new Voiture(5,7);

$MaVoiture->Avancer();
$MaVoiture->Reculer();
$MaVoiture->Freiner();
*/

?> 