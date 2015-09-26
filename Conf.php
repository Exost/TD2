<?php

	class conf {
	
		static private $databases = array(
	    // Le nom d'hote est infolimon a l'IUT
	    // ou localhost sur votre machine
	    'hostname' => 'localhost',
	    // A l'IUT, vous avez une BDD nommee comme votre login
	    // Sur votre machine, vous devrez creer une BDD
	    'database' => 'TDWEB',
	    // A l'IUT, c'est votre login
	    // Sur votre machine, vous avez surement un compte 			'root'
	    'login' => 'exost',
	    // A l'IUT, c'est votre mdp (INE par defaut)
	    // Sur votre machine personelle, vous avez creez ce 		mdp a l'installation
	    'password' => 'samsam34'
	  	);
            // la variable debug est un boolean
    			static private $debug = True;
       
    	        static public function getDebug(){
                return self::$debug;
                }

	 static public function getLogin() {
    		//en PHP l'indice d'un tableau n'est pas 			forcement un chiffre.
    		return self::$databases['login'];
  	}

	static public function getHostname() {
		// retourne le nom de l'hote soit 'infolimon'
		return self::$databases['hostname'];
	}

	static public function getDatabase() {
		//retourne le nom de la database soit 'afanouj'
// self == this en java
		return self::$databases['database'];
	}

	static public function getPassword() {
		// retourne le password de l'usr ( login ) 			soit ... 'Samsam34' 
		return self::$databases['password'];
	}

	

   
}

?>
