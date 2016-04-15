<?php
session_start();
require_once("../config.php");
if(check_session()){
	extract($_GET);
	$action = (!isset($action))?"view":$action;
	switch ($action) {
		case 'view':
			$medicaments = Doctrine_Core::getTable('Medicament')->findAll();
			$smarty->assign("medicaments",$medicaments);
			$smarty->display("medicament.tpl");
			break;
		case 'detail':
			if(isset($id) && !empty($id)){
				$medicaments = Doctrine_Core::getTable('Medicament');
				$medicament  = $medicaments->findOneById_Medicament($id);
				$smarty->assign("medicament", $medicament);
				$smarty->display("drug-profil.tpl");
			}
			break;
		default:
			echo "wrong";
			//$smarty->display("error.tpl");
			break;
	}
}else{
	header("Location: login.php");
}