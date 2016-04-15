<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:35:11
         compiled from "..\Smarty\templates\doctors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:355150dafd0f5647e8-95844040%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48be2100999b02670f4d9bb13eaf8363757662db' => 
    array (
      0 => '..\\Smarty\\templates\\doctors.tpl',
      1 => 1356479942,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '355150dafd0f5647e8-95844040',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafd0f663080_61039575',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafd0f663080_61039575')) {function content_50dafd0f663080_61039575($_smarty_tpl) {?><!doctype html>
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
		<a href="doctors.php?action=addForm" data-icon="plus" class="ui-btn-right" data-theme="a">Ajouter</a>
		<h1>MVsync</h1>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-filter="true">
			<?php  $_smarty_tpl->tpl_vars['doctor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['doctor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['doctors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['doctor']->key => $_smarty_tpl->tpl_vars['doctor']->value){
$_smarty_tpl->tpl_vars['doctor']->_loop = true;
?>
			<li><a href="doctors.php?action=detail&id=<?php echo $_smarty_tpl->tpl_vars['doctor']->value->id_medecin;?>
">
					<img src="../images/profils/<?php echo $_smarty_tpl->tpl_vars['doctor']->value->photo;?>
"/>
					<h4><?php echo $_smarty_tpl->tpl_vars['doctor']->value->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['doctor']->value->prenom;?>
</h4>
					<p><?php echo $_smarty_tpl->tpl_vars['doctor']->value->fax;?>
</p>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
	<div data-role="footer">
		<h3>Copyright</h3>
	</div>
</div>

	</body>
</html><?php }} ?>