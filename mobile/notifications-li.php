<?php
	session_start();
	require_once("../config.php");
	$user_id = $_SESSION['user_id'];
	extract($_GET);
	$action = (!isset($action))?"":$action;
	$vue = -1;
	if(check_session() && strpos($_SESSION['rights'],"delegue")!==false){ 
		if($action=="all"){
			$vue = null;
		}
		if($visites = Doctrine_Core::getTable('Visite')->getMyDelegatesVisites($user_id, $vue)->execute()){
			foreach ($visites as $visite) {
				$visite->vue=0;
				$visite->save();
			}
			echo '0|';
			$smarty->assign("visites", $visites);
			$smarty->display("notifications-li.tpl");
		}
	}else{
		echo '-1|';
		show_errors($rights_title, $rights_message, $smarty);
	}