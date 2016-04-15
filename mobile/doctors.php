<?php
	session_start();
	require_once("../config.php");
	if(check_session()){
		extract($_GET);
		$action = (!isset($action))?"view":$action;
		switch ($action) {
			case 'view':
				$doctors = Doctrine_Core::getTable('Medecin')->findAll();
				$smarty->assign("doctors",$doctors);
				$smarty->display("doctors.tpl");
				break;
			case 'detail':
				if(isset($id) && !empty($id) && is_numeric($id)){
					$doctors = Doctrine_Core::getTable('Medecin');
					$types = Doctrine_Core::getTable('Type');
					if($doctor  = $doctors->findOneById_Medecin($id)){
						$type = $types->findOneBy("id_type", $doctor->id_type1);
						$smarty->assign("doctor", $doctor);
						$smarty->assign("type", $type);
						$smarty->display("profil.tpl");
					}else{
						show_errors(null, null, $smarty);
					}
				}else{
					show_errors(null, null, $smarty);
				}
				break;
			default:
				show_errors(null, null, $smarty);
				break;
		}
	}else{
		header("Location: login.php");
	}