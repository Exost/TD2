<?php
	
	require 'Users.php' ;
	require 'Trajet.php' ;


	$ptDep = $_GET["depart"];
	
	$ptArr = $_GET["arrivee"];
	
	$dateDep = $_GET["date"];

	$trajetX = new trajet($ptDep, $ptArr, $dateDep);

	//$Trajet->afficher() ;

    $trajetX->insertVoiture()


?>
