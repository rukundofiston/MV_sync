<?php
//Chargement de Doctrine
require_once (dirname(__FILE__) . '/Doctrine/Doctrine.php');
//Inscription de l'autoloader
spl_autoload_register( array ( 'Doctrine', 'autoload' ));
spl_autoload_register( array ( 'Doctrine_Core', 'modelsAutoload' )) ;
//Définition des paramètres de connexion
$hostname = '127.0.0.1';
$database = 'mv_sync';
$user = 'root';
$password = '';
//Création du DNS
$dns = 'mysql://' . $user . ':' . $password . '@' . $hostname . '/' . $database;
//Création de la connexion
try{
	$manager = Doctrine_Manager :: getInstance();
	$conn = Doctrine_Manager :: connection($dns, 'doctrine');
	
	//Configuration de la connexion
	$conn->setOption('username', $user);
	$conn->setOption('password', $password);
	$manager->setAttribute(Doctrine_Core::ATTR_VALIDATE, Doctrine_Core :: VALIDATE_ALL);
	$manager->setAttribute(Doctrine_Core::ATTR_EXPORT, Doctrine_Core :: EXPORT_ALL);
	$manager->setAttribute(Doctrine_Core::ATTR_MODEL_LOADING, Doctrine_Core :: MODEL_LOADING_CONSERVATIVE);
	$manager->setAttribute(Doctrine_Core::ATTR_AUTOLOAD_TABLE_CLASSES, true);
}catch(Doctrine_Connection_Exception $e){
	$message = "Connection error";
	$smarty->display("error.tpl", $message);
}
?>