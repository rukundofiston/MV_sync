<?php
	define('SMARTY_DIR', '../../outils/Smarty/libs/');
	define('_DRIVER', 'mysql');
	define('_SERVER', 'localhost');
	define('_USER', 'root');
	define('_PASSWORD', '');
	define('_DB_NAME', 'contacts');
	require_once(SMARTY_DIR . 'SmartyBC.class.php');
	require_once('../bootstrap.php');
	require_once('../functions.php');
	Doctrine_Core :: loadModels('../models');
	$smarty = new Smarty();
	$smarty->debugging = 0;
	$smarty->template_dir = '../Smarty/templates/';
	$smarty->compile_dir = '../smarty/templates_c/';
	$smarty->config_dir = '../smarty/configs/';
	$smarty->cache_dir = '../smarty/cahe/';

/**Message d'erreur :D**/
	$rights_title = "Accès refusé"; // this is the title for access rights haa :) 
	$rights_message = "Vous n'avez pas les droits pour acceder a cette page !"; // and this is the message that's gonna be shown 
	$no_visite = "Aucune Visite trouvée";