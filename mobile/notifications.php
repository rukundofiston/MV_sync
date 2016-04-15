<?php
	session_start();
	require_once("../config.php");
	if(check_session() && strpos($_SESSION['rights'],"delegue")!==false){
		extract($_SESSION);
		$visites = Doctrine_Core::getTable('Visite')->getMyDelegatesVisites($user_id, null)->execute();
		$smarty->assign("visites", $visites);
		$smarty->display("notifications.tpl");
	}else{
		header("Location: index.php");
	}