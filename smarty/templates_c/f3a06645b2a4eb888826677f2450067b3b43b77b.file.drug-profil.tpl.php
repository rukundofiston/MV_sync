<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:43:38
         compiled from "..\Smarty\templates\drug-profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3035350dafd3440eca9-65208506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3a06645b2a4eb888826677f2450067b3b43b77b' => 
    array (
      0 => '..\\Smarty\\templates\\drug-profil.tpl',
      1 => 1356529416,
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
  'nocache_hash' => '3035350dafd3440eca9-65208506',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafd34558d00_14424323',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafd34558d00_14424323')) {function content_50dafd34558d00_14424323($_smarty_tpl) {?><!doctype html>
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
    <?php $_smarty_tpl->tpl_vars['backUrl'] = new Smarty_variable('drugs.php', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['headerName'] = new Smarty_variable($_smarty_tpl->tpl_vars['medicament']->value->libelle, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['home'] = new Smarty_variable(true, null, 0);?>
    <?php /*  Call merged included template "header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '3035350dafd3440eca9-65208506');
content_50daff0a850172_87000095($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "header.tpl" */?>
	<div data-role="content">
        <div data-role="collapsible" data-collapsed="false" >
            <h3>Prix</h3>
            <div class="ui-grid-a my-breakpoint center" >
                <p><?php echo $_smarty_tpl->tpl_vars['medicament']->value->prix;?>
</p>
            </div>
        </div>
        <div data-role="collapsible" data-collapsed="false">
            <h3>Descriptions</h3>
            <div class="ui-block-a my-breakpoint center" >  
            <?php if (!empty($_smarty_tpl->tpl_vars['medicament']->value->desctiption)){?>
                <div>
                    <p> <?php echo $_smarty_tpl->tpl_vars['medicament']->value->desctiption;?>
 </p>                      
                </div>
            <?php }?>
           
        </div>
        <div data-role="footer" data-theme="a" data-position="fixed">
            <h3>Copyright</h3>
        </div>
    </div>
</div>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:43:38
         compiled from "..\Smarty\templates\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50daff0a850172_87000095')) {function content_50daff0a850172_87000095($_smarty_tpl) {?><div data-role="header">
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