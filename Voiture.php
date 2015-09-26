<?php

Require_once "Model.php";

class Voiture {

  private $marque;
  private $couleur;
  private $immatriculation;
  private $options ;
   
  //un getter      
  public function getMarque() {
       return $this->marque;  
  }
  
  //un setter 
  public function setMarque($marque2) {
       $this->marque = $marque2;
  }
   
   //Un constructeur // commentaire pour TD2 !! Il y a un constructeur vide par défaut 
   /*public function __construct($m,$c,$i)  {
     $this->marque = $m;
     $this->couleur = $c;
     $this->immatriculation = $i; 
     $this->options = array();   
  } */

    public function __construct($m = NULL, $c = NULL, $i = NULL) { // constructeur TD2 qui permet d'avoir 0 ou 3 arguments
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
        $this->options = array();
    }

  // une methode d'affichage.
  public function afficher() {
    echo '<p> Voiture '.$this->immatriculation.' de marque '.$this->marque.' et de couleur '.$this->couleur.' </p>' ;
	//foreach ( $this->options as $i => $option ) {
		//echo($this->options[$i]);
	//}
  }
  
	public function addOption($uneOption) {
	$this->options[] = $uneOption;
  	}

	public static function getAllVoiture() {

        $rSQL =  "SELECT * FROM Voiture"; // Requête à éffectuée
        $rep = Model::$pdo->query( $rSQL ); // On appelle la fonction query avec la requête en param et on 		la stock dans $rep
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture'); // On déclare que l'objet retournes font partie de 		la classe Voiture
        $return = $rep->fetchAll() ;
        return $return ;
        }
		
	/*public static function getVoitureByImmat($immat) {
	    $sql = "SELECT * from voiture WHERE immatriculation='$immatriculation'"; 
	    $rep = Model::$pdo->query($sql);
	    $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
	    return $rep->fetch();
	} */ // Vulnérables aux injections SQL

	public static function getVoitureByImmat($immatriculation) {
	  $sql = "SELECT * from Voiture WHERE immatriculation=:nom_var";
	  try {
		$req_prep = Model::$pdo->prepare($sql);
	  	$req_prep->bindParam(":nom_var", $immatriculation);
	  	$req_prep->execute();
		$req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
	  // Vérifier si $req_prep->rowCount() != 0
	  return $req_prep->fetch();
	} catch (PDOException $e) {
          if (Conf::getDebug()) {
              echo $e->getMessage(); // affiche un message d'erreur
          } else {
              echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
          }
          die();
      }

	}

	public function insertVoiture()
    {
        // INSERT INTO table_name (column1, column2, ...) VALUES (value1, value2, ...)

        $sql = "INSERT INTO Voiture (immatriculation,marque,couleur) VALUES ( :immatriculation, 			:marque , :couleur);";

        try {
            $req_prep = Model::$pdo->prepare($sql);
            /* $req_prep->bindParam(":immatriculation", $immatriculaiton);
            $req_prep->bindParam(":marque", $marque);
            $req_prep->bindParam(":couleur", $couleur); */ //C'est la même chose
            $values = array(
                "immatriculation" => $this->immatriculation,
                "marque" => $this->marque,
                "couleur" => $this->couleur

            );
            $req_prep->execute($values); // !!! Attention à mettre values en paramètre
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }

        echo '<br>Voiture crée';
    }

}
?>
