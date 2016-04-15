<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:31:54
         compiled from "..\Smarty\templates\desktop_.tpl" */ ?>
<?php /*%%SmartyHeaderCode:721650dafa93124198-69807690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21e12db112d6261c722870ffb1e2138ca5506a7c' => 
    array (
      0 => '..\\Smarty\\templates\\desktop_.tpl',
      1 => 1356528711,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '721650dafa93124198-69807690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafa93464ee4_11231490',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafa93464ee4_11231490')) {function content_50dafa93464ee4_11231490($_smarty_tpl) {?><!doctype html>
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
		
<div data-role="page" id="desktop">
	<div data-role="header" class="header">
		<a href="logout.php" data-icon="delete" class="ui-btn-right">Deconnexion</a>
		<h1>Bonjour <?php echo $_SESSION['user_name'];?>
</h1>
	</div>
	<div data-role="content">
    <div id="logo"></div>
		<ul id="list-grid">
			<li><a href="tasks.php"><div class="tasks">Visites</div></a></li>
			<li><a href="reports.php"><div class="reports">Rapports</div></a></li>
			<?php if (strpos($_SESSION['rights'],"stats")!==false){?>
			<li><a href="charts.php"><div class="stats">Statistiques</div></a></li>
			<?php }?>
			<li><a href="drugs.php"><div class="pills">Médicaments</div></a></li>
			<li><a href="events.php"><div class="evnm">Événement</div></a></li>
			<li><a href="doctors.php?action=view"><div class="doctors">Medecins</div></a></li>
			<?php if (strpos($_SESSION['rights'],"delegue")!==false){?>
			<li><a href="doctors.php?action=view"><div class="noti">Notification</div></a></li>
			<?php }?>
		</ul>
	</div>
	<div data-role="footer" data-position="fixed">
		<h1>Création de Dream !t Sollutions</h1>
	</div>
</div>

	</body>
</html><?php }} ?>