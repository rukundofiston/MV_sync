<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:21:12
         compiled from "..\Smarty\templates\admin\vente.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1139550daf9c85d77e8-13895019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27c2fe5a7bd47d6b10596c075dd4a53116b3a09c' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\vente.tpl',
      1 => 1356521698,
      2 => 'file',
    ),
    'd426cae480d5e2e4b7d6210fdc1c6e3a0afa3ed0' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\skeleton.tpl',
      1 => 1356527702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1139550daf9c85d77e8-13895019',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50daf9c86a71a6_55646953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50daf9c86a71a6_55646953')) {function content_50daf9c86a71a6_55646953($_smarty_tpl) {?><!DOCTYPE HTML> 
<html>
	<head>
		<meta charset="utf-8">
		<title>MVsync</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="css/images/favicon.png">
		<link href="../css/jquery-ui.css" rel="stylesheet">
		<link href="../css/admin/base.css" rel="stylesheet">
		<link href="../css/admin/responsive.css" rel="stylesheet">
		<script type="text/javascript" src="../scripts/jquery.js"></script>
		<script type="text/javascript" src="../scripts/jquery-ui.js"></script>
	</head>
	<body>
	<div id="sidebar" class="collapse">
		<div class="logo">
	   		<a href="index.html"></a>
		</div>
		<ul id="sidebar_menu" class="navbar nav nav-list sidebar_box">
			<li class="accordion-group active">
				<a class="dashboard" href="medecin.php"><img src="../css/img/menu_icons/dashboard.png">Medecin</a>
			</li>
			<li class="accordion-group">
				<a class="dashboard" href="medicament.php"><img src="../css/img/menu_icons/calendar.png">Medicament</a>
			</li>
			<li class="accordion-group">
				<a class="dashboard" href="demande.php"><img src="../css/img/menu_icons/tables.png">Demande</a>
			</li>
			<li class="accordion-group">
				<a class="dashboard" href="evenement.php"><img src="../css/img/menu_icons/dashboard.png">Evenement</a>
			</li>
			<li class="accordion-group">
				<a class="dashboard" href="vente.php"><img src="../css/img/menu_icons/dashboard.png">Vente</a>
			</li>
		</ul>
	</div>
	<div id="main">
		<div class="container">
			<div class="container_top">
				<div class="row-fluid">
					<div class="top_bar_stats to_hide_tablet">
					</div>
				</div>
				<div class="top-right">
					
					<ul class="nav nav_menu">
					</ul>
				</div>
			</div>
			<div class="container2">
				<div class="row-fluid">
					
				<button id="ajouter" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li><i class="gicon-plus-sign"></i> Ajouter</li>
					</ul>
				</button>
			<form action="pdf.php" method="post" id="vente_form">
	             <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Zone</label>
	                <div class="controls span7">
	                  <select id="secteur" name="id_secteur">
	                  	<?php  $_smarty_tpl->tpl_vars['secteur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['secteur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['secteurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['secteur']->key => $_smarty_tpl->tpl_vars['secteur']->value){
$_smarty_tpl->tpl_vars['secteur']->_loop = true;
?>
	                    <option value="<?php echo $_smarty_tpl->tpl_vars['secteur']->value->id_secteur;?>
"><?php echo $_smarty_tpl->tpl_vars['secteur']->value->libelle;?>
</option>
	                    <?php } ?>
	                  </select>
	                </div>
	              </div>
	              <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Medicament</label>
	                <div class="controls span7">
	                  <select id="medicament" name="id_medicament">
	                  	<?php  $_smarty_tpl->tpl_vars['medicament'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['medicament']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['medicaments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['medicament']->key => $_smarty_tpl->tpl_vars['medicament']->value){
$_smarty_tpl->tpl_vars['medicament']->_loop = true;
?>
	                    	<option value="<?php echo $_smarty_tpl->tpl_vars['medicament']->value->id_medicament;?>
"><?php echo $_smarty_tpl->tpl_vars['medicament']->value->libelle;?>
</option>
	                    <?php } ?>
	                  </select>
	                </div>
	              </div>
	          	  <div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Du 
					</label>
					<div class="controls span7">
						<input id="debut" type="text" name="date_debut" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Fin
					</label>
					<div class="controls span7">
						<input id="fin"  name="date_fin" type="text" class="span12">
					</div>
				</div>
				<button id="btn_consult_vente" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li> Consulter les statitiques</li>
					</ul>
				</button>
				<button type="submit" id="btn_generer_etat" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li> Générer L'état</li>
					</ul>
				</button>
			</form>
				<br>
				  <img class="loader load" src="loader.gif"/>
	              <div id="chart_div"></div>
	              <!--Boite de dialogue pour l'ajout d'une vente -->
	              <div id="dialog_ajout_vente" title="Ajout d'une vente">
					<form action="vente.php" method="POST" id="ajout_vente">
						 <div class="form-row control-group row-fluid">
			                <label class="control-label span3" for="default-select">Zone</label>
			                <div class="controls span7">
			                  	<select id="sect"></select>
	               			</div>
	              		 </div>
	              		 <div class="form-row control-group row-fluid">
			                <label class="control-label span3" for="default-select">Medicament</label>
			                <div class="controls span7">
	                  			<select id="med"> </select>
	               		    </div>
	             		 </div>
	             		 <div class="form-row control-group row-fluid">
							<label class="control-label span3">
								Date
							</label>
							<div class="controls span7">
								<input id="date" type="text" class="span12">
							</div>
						</div>
						<div class="form-row control-group row-fluid">
							<label class="control-label span3">
								Quantité
							</label>
							<div class="controls span7">
								<input type="text" id="amount" style="border: 0; color: gray; font-weight: bold;" />
								<div id="slider-range-min"></div>
							</div>
						</div>
						<div class="form-actions row-fluid">
							<div class="span7 offset3">
								<input id="btn_ajout_vnt" type="submit" class="btn btn-primary" value="Ajouter"/>
								<button type="button" id="btn_annuler_ajout_vnt" class="btn btn-secondary">Annuler</button>
							</div>
						</div>
						<img class="loader" src="load.gif"/>
					</form>
				</div><!--Fin de boite de dialogue -->
<link rel="stylesheet" type="text/css" href="../css/admin/vente.css">
<script type="text/javascript" src="../scripts/admin/jquery.flot.js"></script>
<script type="text/javascript" src="../scripts/admin/vente.js"></script>

				</div>
			</div>
		</div>
	</div>
	</body>
</html>

<?php }} ?>