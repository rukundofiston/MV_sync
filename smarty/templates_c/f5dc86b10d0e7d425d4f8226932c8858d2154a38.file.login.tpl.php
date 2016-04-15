<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:24:37
         compiled from "..\Smarty\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158250dafa9536f283-24133729%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5dc86b10d0e7d425d4f8226932c8858d2154a38' => 
    array (
      0 => '..\\Smarty\\templates\\login.tpl',
      1 => 1356127066,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158250dafa9536f283-24133729',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafa9546f645_91064178',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafa9546f645_91064178')) {function content_50dafa9546f645_91064178($_smarty_tpl) {?><!doctype html>
<html>
	<head>
		<title>MVsync</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="../css/jquery-mobile-structure.css">
		<link rel="stylesheet" type="text/css" href="../css/mv-sync.css">
		<script type="text/javascript" src="../scripts/jquery.js"></script>
		<script type="text/javascript" src="../scripts/jquery-ui.js"></script>
		<script type="text/javascript" src="../scripts/jquery-punch.js"></script>
		<script type="text/javascript" src="../scripts/jquery-mobile.js"></script>
		<script type="text/javascript" src="../scripts/main.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		
<div data-role="page" id="login-page">
	<div data-role="content">
		<div class="vertical-align-center" id="logbox">
			<div id="logo"></div>
			<div class="form">
				<form id="logfrm" data-role="fieldcontain" action="login.php" method="post">
					<input type="text" name="login" id="user" required="required" placeholder="Utilisateur"/>
					<input type="password" name="passwd" id="mdp" required="required" placeholder="Mot de Passe"/>
					<input type="submit"  value="Se connecter" id="submitBtn" data-theme="d" />
					<br><span class="error" style="display:<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
">Votre nom d'utilisateur ou mot de passe est inccorect</span>
				</form>
			</div>
		</div>
	</div>
</div>

	</body>
</html><?php }} ?>