<?php

    Require_once "Model.php";

class user {
	
	private $idUsr;
    static $nbUser = 1;
	private $nom;
    private $prenom;
    private $age ;
    private $voiture; // TODO faire un addVoiture()

    //TODO faire un constructeur avec voiture après ?
    public function  __construct( $name  = NULL , $nickname = NULL , $age = NULL ){
        if ( !is_null($name) && !is_null($nickname) && !is_null($age) )
        {
            $this->nom = $name ;
            $this->prenom = $nickname ;
            $this->age = $age ;
            $this->idUsr = Users::$nbUser ;
            Users::$nbUser +1 ;
        }

    }


    public function getIdUser()
    {
        return $this->idUsr ;
    }


    public function getNom()
    {
        return $this->nom ;
    }

    public function getPrenom()
    {
        return $this->nom ;
    }

    public function getVoiture()// first 1voiture/usr mais faudra modif en array
    {
        return $this->voiture ;
    }

    public function afficher()
    {
        echo '<p> User n°' . $this->idUsr . ' Nom :' . $this->nom . ' prénom : ' . $this->prenom .' âge :'.
            $this->age.'</p>';
    }

}