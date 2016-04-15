<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:25:58
         compiled from "..\Smarty\templates\form_task.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1459950dafae672cca2-71454041%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a2372a3560798e93dfb8f36375cb8dab83893d8' => 
    array (
      0 => '..\\Smarty\\templates\\form_task.tpl',
      1 => 1355270721,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
    '13c7b05c16b9e1c824a6f4ea9976d83ef603ce3e' => 
    array (
      0 => '..\\Smarty\\templates\\doctors-select.tpl',
      1 => 1356386582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1459950dafae672cca2-71454041',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafae68f5ff6_34384596',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafae68f5ff6_34384596')) {function content_50dafae68f5ff6_34384596($_smarty_tpl) {?><!doctype html>
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
		
	<?php /*  Call merged included template "doctors-select.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("doctors-select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1459950dafae672cca2-71454041');
content_50dafae67be7d8_03195866($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "doctors-select.tpl" */?>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:25:58
         compiled from "..\Smarty\templates\doctors-select.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50dafae67be7d8_03195866')) {function content_50dafae67be7d8_03195866($_smarty_tpl) {?><div data-role="page" id="doctors-select">
	<div data-role="header">
		<h1>MVsync</h1>
	</div>
	<div data-role="content">
		<form action="tasks.php?action=step1" data-ajax="false" method="post">
			<div data-role="fieldcontain">
				<ul data-role="listview" data-filter="true" data-filter-placeholder="Ville Nom Prenom">
				<?php  $_smarty_tpl->tpl_vars['doctor'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['doctor']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['doctors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['doctor']->key => $_smarty_tpl->tpl_vars['doctor']->value){
$_smarty_tpl->tpl_vars['doctor']->_loop = true;
?>
					<li data-filtertext="<?php echo $_smarty_tpl->tpl_vars['doctor']->value->Secteur->libelle;?>
 <?php echo $_smarty_tpl->tpl_vars['doctor']->value->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['doctor']->value->prenom;?>
">
						<input type="checkbox" name="doctors[]" value="<?php echo $_smarty_tpl->tpl_vars['doctor']->value->id_medecin;?>
" id="checkbox_<?php echo $_smarty_tpl->tpl_vars['doctor']->value->id_medecin;?>
" class="custom" />
						<label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['doctor']->value->id_medecin;?>
"><?php echo $_smarty_tpl->tpl_vars['doctor']->value->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['doctor']->value->prenom;?>
</label>
					</li>
				<?php } ?>
				</ul>
			</div>
			<input type="submit" value="Etape 2">
		</form>
	</div>
	<div data-role="footer" data-theme="a">
		<h3>Copyright</h3>
	</div>
</div><?php }} ?>