<?php
session_start();
require_once("../config.php");
  if(!check_session()){
    extract($_POST);
    print_r($_POST);
    if(isset($login) && !empty($login) && isset($passwd) && !empty($passwd)){
      echo "here";
      $user = Doctrine_Core::getTable('Compte')->findOneBy("login",$login);
      if(!empty($user) && $passwd==$user->passwd){
        $_SESSION['user'] = $user->login;
        $_SESSION['user_id'] = $user->id_delegue; 
        $_SESSION['rights'] = $user->droit;
        $_SESSION['user_type'] = $user->type;
        //header("Location: medecin.php");
      }else{
        echo "hhaa";
        $smarty->assign("msg","inline;");
        $smarty->display("admin/login.tpl");
      }
    }else{
      $smarty->assign("msg","none;");
      //$smarty->display("admin/login.tpl");
    }
  }else{
    header("Location: index.php");
  }