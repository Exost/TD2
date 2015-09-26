<?php
/**
 * Created by PhpStorm.
 * User: Jeff
 * Date: 23/09/2015
 * Time: 22:16
 */

        require_once "Model.php";
        require_once "Trajet.php";
        require_once "Conf.php" ;



    $objet = 0;
    $rep = 0;

    $rSQL = "SELECT * FROM Trajet"; // Requête à éffectuée
    $rep = Model::$pdo->query( $rSQL ); // ON appelle la fonction query avec la requête en param et on la stock dans $rep
    $tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);

    foreach($tab_obj as $i => $objet ){
        echo "Trajet : $objet->pDep , de couleur $objet->pArr et de marque $objet->dateDep <br> " ;
    }


    echo '<br> post <br>' ;
   // print_r( Trajet::getAllTrajet() ) ;

    echo '<br> post <br>' ;
   // print_r( Trajet::getTrajetByID('3') ) ;


    echo '<br> post <br>' ;
    $Xo = new Trajet('Montpellier','Vogue','28/04'); // Contructeur ( marque , couleur , immat )
    print_r( $Xo->insertTrajet() );


    ?>
