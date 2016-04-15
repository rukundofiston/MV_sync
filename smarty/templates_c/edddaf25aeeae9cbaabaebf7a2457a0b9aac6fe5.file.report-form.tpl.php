<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:29:29
         compiled from "..\Smarty\templates\report-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2152550dafbb99a2753-07580416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edddaf25aeeae9cbaabaebf7a2457a0b9aac6fe5' => 
    array (
      0 => '..\\Smarty\\templates\\report-form.tpl',
      1 => 1356457221,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
    '42bbb9361277e1e00cc7f50145d5abbbada4a767' => 
    array (
      0 => '..\\Smarty\\templates\\header.tpl',
      1 => 1356456633,
      2 => 'file',
    ),
    '4d4e5f9a2a1ae2fae69f71f5cffdbd7954c5e3c4' => 
    array (
      0 => '..\\Smarty\\templates\\report-items.tpl',
      1 => 1356279570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2152550dafbb99a2753-07580416',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafbb9b68b06_56800568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafbb9b68b06_56800568')) {function content_50dafbb9b68b06_56800568($_smarty_tpl) {?><!doctype html>
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
	<?php $_smarty_tpl->tpl_vars['backUrl'] = new Smarty_variable('rapports.php', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['headerName'] = new Smarty_variable('Créer votre rapport', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['home'] = new Smarty_variable(true, null, 0);?>
	<?php /*  Call merged included template "header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '2152550dafbb99a2753-07580416');
content_50dafbb9ab7475_19669414($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "header.tpl" */?>
	<div data-role="content">
		<form action="reports.php?action=generate" method="post">
			<input type="date" name="date" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
">
			<input type="submit" data-theme="d" value="G&eacute;n&eacute;rer">
		</form>
		<?php if (count($_smarty_tpl->tpl_vars['visites']->value)!=0){?>
		<form action="reports.php?action=add" method="post">
		<label>Introduction : </label>
		<div data-role="fieldcontain">
			<textarea name="introduction"></textarea>
		</div>
		<label>Conclusion : </label>
		<div data-role="fieldcontain">
			<textarea name="conclusion"></textarea>
		</div>
		<?php /*  Call merged included template "report-items.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('report-items.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '2152550dafbb99a2753-07580416');
content_50dafbb9af7a98_91529194($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "report-items.tpl" */?>
		<input type="hidden" name="date" value="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
">
		<input type="submit" data-theme="d" value="Cr&eacute;er">
		</form>
		<?php }else{ ?>
		<ul data-role="listview" data-inset="true" data-divider-theme="b">
			<li data-role="list-divider" >Il n'y a pas de visite pour le jours en question</li>
		</ul>
		<?php }?>
	</div>
	<div data-role="footer">
		<h3>Copyright</h3>
	</div>
</div>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:29:29
         compiled from "..\Smarty\templates\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50dafbb9ab7475_19669414')) {function content_50dafbb9ab7475_19669414($_smarty_tpl) {?><div data-role="header">
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-left">
		<a data-role="button" href="<?php echo $_smarty_tpl->tpl_vars['backUrl']->value;?>
" data-icon="back" data-iconpos="notext">Précedent</a>
		<?php if ($_smarty_tpl->tpl_vars['home']->value==true){?>
		<a data-role="button" href="index.php" data-icon="home" data-iconpos="notext">Accueil</a>
		<?php }?>
	</div>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-right">
	<a data-role="button" href="logout.php" data-icon="delete" data-iconpos="right">Déconnexion</a>
	</div>
	<h1><?php echo $_smarty_tpl->tpl_vars['headerName']->value;?>
</h1>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:29:29
         compiled from "..\Smarty\templates\report-items.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50dafbb9af7a98_91529194')) {function content_50dafbb9af7a98_91529194($_smarty_tpl) {?><ul data-role="listview" data-inset="true" data-theme="a" data-divider-theme="d">
	<li data-role="list-divider" >La liste des m&eacute;decin visit&eacute; pendant la journ&eacute;e du : <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</li>
	<?php  $_smarty_tpl->tpl_vars['visite'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['visite']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['visite']->key => $_smarty_tpl->tpl_vars['visite']->value){
$_smarty_tpl->tpl_vars['visite']->_loop = true;
?>
	<li>
		Dr. <?php echo $_smarty_tpl->tpl_vars['visite']->value->Medecin->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['visite']->value->Medecin->prenom;?>

		<p class="ui-li-aside"><?php echo $_smarty_tpl->tpl_vars['visite']->value->date;?>
</p>
		<?php  $_smarty_tpl->tpl_vars['demande'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['demande']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['visite']->value->Demande; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['demande']->key => $_smarty_tpl->tpl_vars['demande']->value){
$_smarty_tpl->tpl_vars['demande']->_loop = true;
?>
			<li><p>- <?php echo $_smarty_tpl->tpl_vars['demande']->value->description;?>
</p></li>	
		<?php } ?>
		<input name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['visite']->value->id_visite;?>
" type="hidden">
	</li>
	<?php } ?>
</ul><?php }} ?>