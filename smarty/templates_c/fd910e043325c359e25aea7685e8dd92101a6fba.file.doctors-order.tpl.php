<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:26:02
         compiled from "..\Smarty\templates\doctors-order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:763450dafaeaa5c906-74307727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd910e043325c359e25aea7685e8dd92101a6fba' => 
    array (
      0 => '..\\Smarty\\templates\\doctors-order.tpl',
      1 => 1356479935,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '763450dafaeaa5c906-74307727',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafaeab39849_56143746',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafaeab39849_56143746')) {function content_50dafaeab39849_56143746($_smarty_tpl) {?><!doctype html>
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
		
<div data-role="page">
	<script type="text/javascript" src="../scripts/main.reorder.js"></script>
	<div data-role="header">
		<h1>Etape 2</h1>
	</div>
	<div data-role="content">
		<form action="tasks.php?action=finish" method="post">
			<ul data-role="listview" data-filter="true" class="sortable">
				<?php  $_smarty_tpl->tpl_vars['visite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['visite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['visite']->key => $_smarty_tpl->tpl_vars['visite']->value){
$_smarty_tpl->tpl_vars['visite']->_loop = true;
?>
				<li id="id_<?php echo $_smarty_tpl->tpl_vars['visite']->value->id_visite;?>
" >
					<img src="../images/profils/photo.png"/>
					<h4><?php echo $_smarty_tpl->tpl_vars['visite']->value->Medecin->prenom;?>
 <?php echo $_smarty_tpl->tpl_vars['visite']->value->Medecin->nom;?>
</h4>
				</li>
				<?php } ?>
			</ul>
			<a href="tasks.php" rel="external" data-icon="check" data-role="button">Terminer</a>
		</form>
	</div>
	<div data-role="footer">
		<h3>Copyright</h3>
	</div>
</div>

	</body>
</html><?php }} ?>