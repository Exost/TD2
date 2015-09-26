<?php 

	require_once 'Conf.php'; 

	class Model {

	public static $pdo;
	
	public static function Init() {
	
		$host = Conf::getHostname() ;
		$dbname = Conf::getDatabase() ;
		$login = Conf::getLogin() ;
		$pass = Conf::getPassword() ;

		try{ //Lorsqu’une erreur se produit, PDO n’affiche pas de message d’erreur.
		
	// Connexion à la base de données            
		// Le dernier argument sert à ce que toutes les chaines de caractères 
		// en entrée et sortie de MySql soit dans le codage UTF-8
		self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $login, $pass,
                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
   
		// On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
		self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//self::$pdo = new PDO("mysql:host=$host;dbname=$dbname",$login,$pass); VERSION Obsolète

		} catch(PDOException $e) {
	  	echo $e->getMessage(); // affiche un message d'erreur
	  	die();
		}
	}
}

	Model::Init() ;
?>
	
