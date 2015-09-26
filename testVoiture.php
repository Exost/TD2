<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
    <?php
      // On importe 'Voiture.php', comme import en Java
      require 'Voiture.php';   

      $voiture1 = new Voiture('Renault','Bleu','256AB34'); 
      $voiture2 = new Voiture('Peugeot','Vert','128AC30');

        $voiture3 = new Voiture('BMW','Noir',"ABCD34");
        $voiture3->addOption('Siège en Cuir');
        $voiture3->addOption('Phares Xénon') ;
		
	

      //$voiture1->afficher();
     // $voiture2->afficher();

       // $voiture3->afficher();


    ?>
    </body>
</html>
