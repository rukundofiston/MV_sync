<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:35:47
         compiled from "..\Smarty\templates\medicament.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3253950dafd33262b84-60120400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '264b175b0980f28602ba284ab1e7cd3b6495ef4b' => 
    array (
      0 => '..\\Smarty\\templates\\medicament.tpl',
      1 => 1356483069,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3253950dafd33262b84-60120400',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafd33468a37_69770540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafd33468a37_69770540')) {function content_50dafd33468a37_69770540($_smarty_tpl) {?><!doctype html>
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
	<div data-role="header">
		<h1>Medicament</h1>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-filter="true">
			<?php  $_smarty_tpl->tpl_vars['medicament'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['medicament']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['medicaments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['medicament']->key => $_smarty_tpl->tpl_vars['medicament']->value){
$_smarty_tpl->tpl_vars['medicament']->_loop = true;
?>
			<li><a href="drugs.php?action=detail&id=<?php echo $_smarty_tpl->tpl_vars['medicament']->value->id_medicament;?>
">
					<h4><?php echo $_smarty_tpl->tpl_vars['medicament']->value->libelle;?>
</h4>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div data-role="footer" data-position="fixed">
		<h3>Copyright</h3>
	</div>
</div>

	</body>
</html><?php }} ?>