<?php
	
	require 'Voiture.php';
	require_once 'Model.php';
	require_once 'Conf.php';   

  $marque = $_POST["marque"];
  
  $couleur = $_POST["couleur"];
  
  $immatriculation = $_POST["immatriculation"];
  
  $voitureX = new Voiture($marque , $couleur , $immatriculation );
  
	//$tabImmat ;
	//$tabImmat = array
	
	//if ( $voitureX->existe()
	$voitureX->insertVoiture() ;


?>
