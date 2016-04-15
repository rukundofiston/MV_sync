<?php
	session_start();
	require_once("../config.php");
	if(check_session()){
		$smarty->display("desktop_.tpl");
	}else{
		header("Location: login.php");
	}