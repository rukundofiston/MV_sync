<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:15:06
         compiled from "..\Smarty\templates\admin\medecin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2999550daf4717f62c4-62980850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2755a23a9b034901cd2feda59dfeb06a9a3a892c' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\medecin.tpl',
      1 => 1356494656,
      2 => 'file',
    ),
    'd426cae480d5e2e4b7d6210fdc1c6e3a0afa3ed0' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\skeleton.tpl',
      1 => 1356527702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2999550daf4717f62c4-62980850',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50daf471ad4e29_57414386',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50daf471ad4e29_57414386')) {function content_50daf471ad4e29_57414386($_smarty_tpl) {?><!DOCTYPE HTML> 
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
					
	<div class="box gradient">
		<div class="title">
			<h2>Medecin</h2>
		</div>
		<div class="content top">
			<div class="row-fluid control-group">
				<button id="Ajouter" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li><i class="gicon-plus-sign"></i> Ajouter</li>
					</ul>
				</button>
				<button type="button" id="Supprimer" class="btn inline btn-danger">
					<ul class="the-icons unstyled">
						<li><i class="gicon-remove-circle"></i> Supprimer</li>
					</ul>
				</button>
			</div>
			<table id="data_medecins" class="responsive table table-striped table-bordered dataTable atable">
				<thead>
					<tr>
						<th><input type="checkbox" id="selectionner_tout"/></th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>adresse</th>
						<th>Fax</th>
						<th>telephone</th>
						<th>Email</th>
						<th>Type</th>
						<th>sexe</th>
						<th>civilite</th>
						<th>Supprimer</th>
						<th>Modifier</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['medecin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['medecin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tab']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['medecin']->key => $_smarty_tpl->tpl_vars['medecin']->value){
$_smarty_tpl->tpl_vars['medecin']->_loop = true;
?>
						<tr id="tr_<?php echo $_smarty_tpl->tpl_vars['medecin']->value->id_medecin;?>
">
							<td><input type="checkbox" name="choix" value="<?php echo $_smarty_tpl->tpl_vars['medecin']->value->id_medecin;?>
"/></td>
							<td class="nom"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->nom;?>
</td>
						    <td class="prenom"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->prenom;?>
</td>
							<td class="adresse"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->adresse;?>
</td>
							<td class="fax"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->fax;?>
</td>
							<td class="tel"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->tel;?>
</td>
							<td class="email"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->email;?>
</td>
							<?php if (count($_smarty_tpl->tpl_vars['medecin']->value->Type)>0){?>
							<td class="type" data-type="<?php echo $_smarty_tpl->tpl_vars['medecin']->value->Type->id_type;?>
"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->Type->libelle;?>
</td>
							<?php }else{ ?>
							<td></td>
							<?php }?>
							<td class="sexe"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->sexe;?>
</td>
							<td class="civilite"><?php echo $_smarty_tpl->tpl_vars['medecin']->value->civilite;?>
</td>
							<td><img src="supprimer.png" id="<?php echo $_smarty_tpl->tpl_vars['medecin']->value->id_medecin;?>
" class="lien_supp"/></td>
							<td><img data-id="<?php echo $_smarty_tpl->tpl_vars['medecin']->value->id_medecin;?>
" data-photo="<?php echo $_smarty_tpl->tpl_vars['medecin']->value->photo;?>
"class="lien_modif" src="modifier.png"/></td>
						</tr>
					<?php } ?>	

				</tbody>
			</table>
		</div>
	</div>
	<!--Boite de dialogue qui sera utilisée pour l'ajout et la modification du profil d'un medecin -->
	<div id="dialog_ajout_modif" class="dialogue" title="Ajouter un médecin">
		<form method="POST" id="add_form" action="" enctype="multipart/form-data" data-type="add" data-id="">
				
				<div class="form-row control-group row-fluid">
					<label class="control-label span3" for="cname">
						Nom 
					</label>
					<div class="controls span7">
						<input id="nom" name="nom" type="text" pattern="[a-zA-Z ]{2,20}" required class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Prenom
					</label>
					<div class="controls span7">
						<input id="prenom" name="prenom" type="text" pattern="[a-zA-Z ]{2,20}" required class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Adresse
					</label>
					<div class="controls span7">
						<input id="adr" name="adresse" type="text" pattern="[a-zA-Z0-9,_ ]{5,50}" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Email
					</label>
					<div class="controls span7">
						<input id="email" name="email" type="email" required="" class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Telephone
					</label>
					<div class="controls span7">
						<input id="tel" name="tel" type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" required class="span12">
					</div>
				</div>
				<div class="form-row control-group row-fluid">
					<label class="control-label span3">
						Fax
					</label>
					<div class="controls span7">
						<input id="fax" name="fax" type="text" class="span12">
					</div>
				</div>
				
	             <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Specialité</label>
	                <div class="controls span7">
	                  <select name="type" id="type">
	                  		<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tab_type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
	                  		<option value="<?php echo $_smarty_tpl->tpl_vars['type']->value->id_type;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->libelle;?>
</option>
	                  		<?php } ?>
	                  </select>
	                </div>
	              </div>
				<div class="form-row control-group row-fluid">
                <label class="control-label span3">Sexe</label>
                <div class="controls span7">
                  <label class="inline radio">
                  <input type="radio" name="sexe" value="f"/> Femme</label>
                  <label class="inline radio">
                  <input type="radio" name="sexe" value="h" checked="CHECKED"/> Homme </label>
                </div>
              </div>
	             <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Civilité</label>
	                <div class="controls span7">
	                  <select name="civilite" id="civilite">
	                    <option value="mr">Monsieur</option>
	                    <option value="mme">Madame</option>
	                    <option value="mzelle">Demoizelle</option>
	                  </select>
	                </div>
	              </div>
				<div id="mainWrapper">
					<div id="uploads"><p>Glisser la photo ICI</p></div>
				</div><!--end mainWrapper-->


				<div class="form-actions row-fluid">
					<div class="span7 offset3">
						<input id="btn_ajout_med" type="submit" class="btn btn-primary" value="Suivant"/>
						<button type="button" id="btn_annuler_ajout_med" class="btn btn-secondary">Annuler</button>
					</div>
				</div>
				<img class="loader" src="load.gif"/>
			</form>
	</div><!--Fin boite de dialogue : Ajout & Modification -->

	<!--Boite de dialogue pour la Suppression d'un medecin -->
	<div id="dialog_suppr_seul" class="dialogue" title="Supprimer un Medecin">
		<h3>Voulez vous Supprimer ce Medecin ? </h3>
		<img class="loader" src="load.gif"/>
	</div>
	<!--Boite de dialogue pour la Suppression de plusieurs medecin -->
	<div id="dialog_suppr_plusieurs" class="dialogue" title="Supprimer un Medecin">
		<h3>ATTENTION : Vous etes sur le point de supprimer <span id="nbr_med_suppr"></span> Medecins ! </h3>
		<img class="loader" src="load.gif"/>
	</div>
	<!--Boite de dialogue pour l'enregistrement de la localisation du medecin dans la base de données -->
	<div id="dialog_ajout_loc_med" class="dialogue" title="Localiser le medecin">
			<div id="googleMap" style="width: 80%; height: 90%; margin-left:10%; margin-right:10%;"></div>
			<button data-action="" data-id="" id="btn_localisattion" style="margin-left:40%; margin-top:3%;">Enregistrer</button>
			<img class="loader" src="load.gif"/>
	</div>
<link rel="stylesheet" type="text/css" href="../css/admin/medecin.css">
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
<script type="text/javascript" src="../scripts/admin/file.drop.js"></script>
<script type="text/javascript" src="../scripts/admin/medecin.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

				</div>
			</div>
		</div>
	</div>
	</body>
</html>

<?php }} ?>