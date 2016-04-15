<?php
	function show_errors($title = null, $message = null, $smarty){
		if(!$title){
			$title = "Error 404 - Page introuvable.";
		}
		if(!$message){
			$message = "La page que vous chercher n'existe pas ou à été déplacée, utiliser les menus pour acceder aux contenus que vous voullez";
		}
		$smarty->assign("title", $title);
		$smarty->assign("message", $message);
		$smarty->display("error.tpl");
	}
	function check_session(){
		if(isset($_SESSION['user']) && isset($_SESSION['user_id']) && isset($_SESSION['rights'])){
			return true;
		}else{
			return false;
		}
	}
	function destroy_session(){
		unset($_SESSION['user']);
	    unset($_SESSION['user_id']);
	    unset($_SESSION['rights']);
	    session_destroy();
	}