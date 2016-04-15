<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:27:54
         compiled from "..\Smarty\templates\medicament-select.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1929250dafb5a903e55-13257297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70c5e7f309e1ff350b60bf2950b4f78ac0d02f43' => 
    array (
      0 => '..\\Smarty\\templates\\medicament-select.tpl',
      1 => 1356518181,
      2 => 'file',
    ),
    '425224356b39a6a21736bbb56a45f739b3da7493' => 
    array (
      0 => '..\\Smarty\\templates\\skeleton.tpl',
      1 => 1356395934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1929250dafb5a903e55-13257297',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafb5a9ed3c4_97869701',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafb5a9ed3c4_97869701')) {function content_50dafb5a9ed3c4_97869701($_smarty_tpl) {?><!doctype html>
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
		
<div data-role="page" id="doctors-select">
	<script type="text/javascript">
		$(function(){
			$("#addMedicament").live("click",function(){
				id = $("#id_visite").val();
				$.ajax({
					type :"post",
					url : "tasks.php?action=addMedicament&id="+id,
					data : $(".checkbox").serialize(),
					success : function(theResponse){
						if(theResponse==0){
							window.location = "tasks.php?action=detail&id="+id;
						}
					}
				});
			});
		});
	</script>
	<div data-role="header">
		<h1>MVsync</h1>
	</div>
	<div data-role="content">
		<form action="" method="post">
			<div data-role="fieldcontain">
				<ul data-role="listview" data-filter="true">
				<?php  $_smarty_tpl->tpl_vars['drug'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['drug']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['drugs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['drug']->key => $_smarty_tpl->tpl_vars['drug']->value){
$_smarty_tpl->tpl_vars['drug']->_loop = true;
?>
					<li>
						<input type="checkbox" name="drugs[]" value="<?php echo $_smarty_tpl->tpl_vars['drug']->value->id_medicament;?>
" id="checkbox_<?php echo $_smarty_tpl->tpl_vars['drug']->value->id_medicament;?>
" class="checkbox" />
						<label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['drug']->value->id_medicament;?>
"><?php echo $_smarty_tpl->tpl_vars['drug']->value->libelle;?>
</label>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div data-role="fieldcontain">
				<input type="button" id="addMedicament" value="Ajouter">
			</div>
		</form>
	</div>
	<div data-role="footer" data-theme="a">
		<h3>Copyright</h3>
	</div>
</div>

	</body>
</html><?php }} ?>