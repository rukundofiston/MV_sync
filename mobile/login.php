<?php
session_start();
require_once("../config.php");
  if(!check_session()){
    extract($_POST);
    if(isset($login) && !empty($login) && isset($passwd) && !empty($passwd)){
      $user = Doctrine_Core::getTable('Compte')->findOneBy("login",$login);
      if(!empty($user) && md5($passwd)==$user->passwd){
        $delegate = Doctrine_Core::getTable('Delegue')->findOneBy("id_delegue",$user->id_delegue);      
        $_SESSION['user'] = $user->login;
        $_SESSION['user_name'] = $delegate->nom.' '.$delegate->prenom;
        $_SESSION['user_id'] = $user->id_delegue; 
        $_SESSION['rights'] = $user->droit;
        header("Location: index.php");
      }else{
        $smarty->assign("msg","inline;");
        $smarty->display("login.tpl");
      }
    }else{
      $smarty->assign("msg","none;");
      $smarty->display("login.tpl");
    }
  }else{
    header("Location: index.php");
  }