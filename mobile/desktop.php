<?php
	session_start();
	require_once("../config.php");
	if(check_session()){
		$smarty->display("desktop.tpl");
	}