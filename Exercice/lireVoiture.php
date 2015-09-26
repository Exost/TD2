

<?php

	require_once "Model.php";
	require_once "Voiture.php";
	require_once "Conf.php" ;
	//require_once "testVoiture.php";



    //echo 'test' ;

    $objet = 0;
    $rep = 0;

	 $rSQL = "SELECT * FROM Voiture"; // Requête à éffectuée
    	$rep = Model::$pdo->query( $rSQL ); // ON appelle la fonction query avec la requête en param et on la stock dans $rep
    	$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ); // Renvois un objet type PDO qui est un tableau d'instance de la classe Voiture 		que 	l'on stock dans le tabu

	foreach($tab_obj as $i => $objet ){
	echo "Voiture : $objet->immatriculation , de couleur $objet->couleur et de marque $objet->marque <br> " ;
	}
	 

    	echo '<br> post <br>' ;
    print_r( Voiture::getAllVoiture() ) ;

	echo '<br> post <br>' ;
	print_r( Voiture::getVoitureByImmat('AAAA') ) ;
	

	/*echo '<br> post <br>' ;
	$viper = new Voiture ('Viper','rouge','CCCC'); // Contructeur ( marque , couleur , immat )
	print_r( $viper->insertVoiture() ); */
	

?>

		
