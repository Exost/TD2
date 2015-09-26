<?php

Require_once "Model.php";

class trajet {

	private $idTrajet;
	static 	$nbTrajet = 1;
	private $ptDep ;
	private $ptArr ;
	private $dateDep ;
	
	//Un constructeur
   /* public function __construct($dep,$arr,$date)  {
	   this->$ptDep = $dep ;
	   this->$ptArr = $arr ;
	   this->$dateDep = $date ;
	   this->$idTrajet = trajet::$compteur;
	   trajet::$compteur = trajet::$compteur + 1;
	} */ // permet le créateur vide de $pdo

	 public function __construct($dep = NULL , $arr = NULL , $date = NULL )
     {

         if (!is_null($dep) && !is_null($arr) && !is_null($date))
         {
            $this->ptDep = $dep;
            $this->ptArr = $arr;
             $this->dateDep = $date;
         }
        $this->idTrajet = Trajet::$nbTrajet;
         Trajet::$nbTrajet + 1;
     }

public function getDep()
     {
         return $this->ptdep;

     }
	
	public function getArr()
     {
         return $this->ptArr;
     }
	
	public function getDate()
     {
         return $this->dateDep;
     }
	
	public function getId()
     {
         return $this->idTrajet;
     }
	
	public function afficher()
     {
         echo '<p> Trajet n°' . $this->idTrajet . ' au départ de' . $this->ptDep . ' et à l arrivée ' . $this->ptArr .'le'.
		 $this->dateDep.'</p>';
	}

	public static function getAllTrajet()
     {
         $rSQL = "SELECT * FROM Trajet";
         $rep = Model::$pdo->query($rSQL); // requête à effectuée
         $rep->setFestchMode(PDO::FETCH_CLASS, 'Trajet'); // On déclare que l'objet $pdo retourné fait partie de la classe Trajet
         $return = $rep->fetchAll(); // On stock le tout dans un tableau
         return $return;
     }

     public static function getTrajetByID ( $idTrajet ) {
        $sql = "SELECT * FROM Trajet WHERE idTrajet=:nom_var";
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $req_prep->bindParam(":nom_var", $idTrajet) ;
            $req_prep->execute() ;
            $req_prep->setFetchMode ( PDO::FETCH_CLASS,'Trajet') ;
            return $req_prep->fetch();
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else
                {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
                }
                    die();
                }
	}

    public function insertTrajet() {
        // TODO -
        $sql = "INSERT INTO Trajet(ptDep, ptArr, dateDep) VALUES ( :depart , :arrivee , :jour )" ;
            // TODO trouver changer dialect
        try {
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "depart" => $this->ptDep,
                "arrivee" => $this->ptArr,
                "jour" => $this->dateDep
            );
            $req_prep->execute($values);
            }  catch (PDOException $e) {
                if (Conf::getDebug()) {
                    echo $e->getMessage(); // affiche un message d'erreur
                } else {
                    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
            }
        echo "<br>Trajet crée" ;
    }




}

?>

