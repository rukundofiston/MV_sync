<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:29:17
         compiled from "..\Smarty\templates\reports.tpl" */ ?>
<?php /*%%SmartyHeaderCode:963250dafbada57f27-42215448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc058abf168cf683b138185c472249610a1413fa' => 
    array (
      0 => '..\\Smarty\\templates\\reports.tpl',
      1 => 1356301009,
      2 => 'file',
    ),
    'd68246cefa3861d4705efeaaa01c1733d0508323' => 
    array (
      0 => '..\\Smarty\\templates\\reports-desktop.tpl',
      1 => 1356456979,
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
  'nocache_hash' => '963250dafbada57f27-42215448',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafbadc2e1b3_19537566',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafbadc2e1b3_19537566')) {function content_50dafbadc2e1b3_19537566($_smarty_tpl) {?><!doctype html>
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
    <?php $_smarty_tpl->tpl_vars['backUrl'] = new Smarty_variable('index.php', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['headerName'] = new Smarty_variable('Rapports', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['home'] = new Smarty_variable(false, null, 0);?>
    <?php /*  Call merged included template "header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '963250dafbada57f27-42215448');
content_50dafbadb83ff3_95277896($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "header.tpl" */?>
    <div data-role="content">
        <div>
            
<ul data-role="listview">
	<?php if (count($_smarty_tpl->tpl_vars['reports']->value)>0){?>
	<?php  $_smarty_tpl->tpl_vars['report'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['report']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['reports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['report']->key => $_smarty_tpl->tpl_vars['report']->value){
$_smarty_tpl->tpl_vars['report']->_loop = true;
?>
		<li><a href="reports.php?action=detail&id=<?php echo $_smarty_tpl->tpl_vars['report']->value->id_rapport;?>
"><?php echo $_smarty_tpl->tpl_vars['report']->value->Delegue->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['report']->value->Delegue->prenom;?>
<span class="right"><?php echo $_smarty_tpl->tpl_vars['report']->value->date;?>
</span></a></li>
	<?php } ?>
	<?php }else{ ?>
		<li>La liste des rapports est vide</li>
	<?php }?>
</ul>

        </div>
    </div>
    <div data-role="footer">
        <div data-role="navbar">
            <ul>
                <?php if (strpos($_SESSION['rights'],"delegue")!==false){?>
                    <li><a href="reports.php?action=viewAll">Rapports de mon equipe</a></li>
                <?php }?>
                <li><a href="reports.php?action=myReports">Mes Rapports</a></li>
                <li><a href="reports.php?action=generate">Creer</a></li>
            </ul>
        </div>
    </div>
</div>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:29:17
         compiled from "..\Smarty\templates\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50dafbadb83ff3_95277896')) {function content_50dafbadb83ff3_95277896($_smarty_tpl) {?><div data-role="header">
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