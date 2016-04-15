<?php
	session_start();
	require_once("../config.php");
	if(check_session()){
		destroy_session();
		header("Location: login.php");
	}