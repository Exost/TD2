<?php
  require 'Conf.php';     //equivalent du import en Java

  // On affiche le login de la base de donnees
  	echo Conf::getLogin();

	echo Conf::getHostname();

	echo Conf::getPassword();

	echo Conf::getDatabase();

?>
