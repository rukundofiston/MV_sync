<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:25:32
         compiled from "..\Smarty\templates\tasks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1308650dafacc812168-40701994%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac446fc5a781a0c3ef2450de6d33ea1cf1b0cfcd' => 
    array (
      0 => '..\\Smarty\\templates\\tasks.tpl',
      1 => 1356516492,
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
  ),
  'nocache_hash' => '1308650dafacc812168-40701994',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafacc9fd992_49895234',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafacc9fd992_49895234')) {function content_50dafacc9fd992_49895234($_smarty_tpl) {?><!doctype html>
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
	<?php $_smarty_tpl->tpl_vars['backUrl'] = new Smarty_variable('index.php', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['headerName'] = new Smarty_variable('Vos visites', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['home'] = new Smarty_variable(false, null, 0);?>
	<?php /*  Call merged included template "header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1308650dafacc812168-40701994');
content_50dafacc8f6a09_19164823($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "header.tpl" */?>
	<div data-role="content">
		<?php if (count($_smarty_tpl->tpl_vars['tasks']->value)==0){?>
			<h4 data-theme="b">Aucune visites n'est trouvée</h4>
		<?php }else{ ?>
			<?php if ($_smarty_tpl->tpl_vars['allVisites']->value==true){?>
				<div data-role="collapsible" data-collapsed="true" data-theme="e">
					<h3>Prochaine visites</h3>
			<?php }?>
				<ul data-role="listview" data-filter="true" class="<?php echo $_smarty_tpl->tpl_vars['sortable']->value;?>
" data-theme="a" data-filter-theme="a">
					<?php  $_smarty_tpl->tpl_vars['task'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['task']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tasks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['task']->key => $_smarty_tpl->tpl_vars['task']->value){
$_smarty_tpl->tpl_vars['task']->_loop = true;
?>
					<li id="id_<?php echo $_smarty_tpl->tpl_vars['task']->value->id_visite;?>
">
						<a href="tasks.php?action=detail&id=<?php echo $_smarty_tpl->tpl_vars['task']->value->id_visite;?>
">
						<h4><?php echo $_smarty_tpl->tpl_vars['task']->value->Medecin->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['task']->value->Medecin->prenom;?>
</h4>
						<p class="ui-li-aside"><?php echo $_smarty_tpl->tpl_vars['task']->value->date;?>
</p>
						</a>
					</li>
					<?php } ?>
				</ul>
			<?php if ($_smarty_tpl->tpl_vars['allVisites']->value==true){?>
				</div>
			<?php }?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['allVisites']->value==true&&count($_smarty_tpl->tpl_vars['oldTasks']->value)>0){?>
		<div data-role="collapsible" data-theme="e">
			<h3>Visite anciennes</h3>
			<ul data-role="listview" data-filter="true" class="<?php echo $_smarty_tpl->tpl_vars['sortable']->value;?>
" data-theme="a" data-filter-theme="a">
				<?php  $_smarty_tpl->tpl_vars['oldTask'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['oldTask']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['oldTasks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['oldTask']->key => $_smarty_tpl->tpl_vars['oldTask']->value){
$_smarty_tpl->tpl_vars['oldTask']->_loop = true;
?>
					<li id="id_<?php echo $_smarty_tpl->tpl_vars['oldTask']->value->id_visite;?>
">
						<a href="tasks.php?action=detail&id=<?php echo $_smarty_tpl->tpl_vars['oldTask']->value->id_visite;?>
">
						<h4><?php echo $_smarty_tpl->tpl_vars['oldTask']->value->Medecin->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['oldTask']->value->Medecin->prenom;?>
</h4>
						<p class="ui-li-aside"><?php echo $_smarty_tpl->tpl_vars['oldTask']->value->date;?>
</p>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php }?>
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li>
					<a href="tasks.php?action=addForm" data-icon="plus" data-iconpos="bottom" data-role="button">Ajouter</a>
				</li>
				<li>
					<a href="tasks.php?action=view" data-icon="plus" data-iconpos="bottom" data-role="button">Mon programme </a>
				</li>
				<li>
					<a href="tasks.php?action=viewDone" data-icon="plus" data-iconpos="bottom" data-role="button">Visites effecut&eacute;e</a>
				</li>
				<li>
					<a href="tasks.php?action=viewAll" data-icon="grid">Liste des visites</a>
				</li>
				<li>
					<a href="tasks.php?action=viewCanceled" data-theme="b" data-icon="delete" data-iconpos="bottom" data-role="button">Visites annul&eacute;es</a>
				</li>
			</ul>
		</div>
	</div>
</div>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:25:32
         compiled from "..\Smarty\templates\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50dafacc8f6a09_19164823')) {function content_50dafacc8f6a09_19164823($_smarty_tpl) {?><div data-role="header">
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
</div><?php }} ?>