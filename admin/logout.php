<?php
	require_once("../config.php");
	if(check_session()){
		unset($_SESSION['user']);
	    unset($_SESSION['user_id']);
	    unset($_SESSION['rights']);
	    unset($_SESSION['user_type']);
	    session_destroy();
	}