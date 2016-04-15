<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:16:27
         compiled from "..\Smarty\templates\admin\medicament.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37550daf8ab7ed9d8-13031283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f6b24fdfeef2ac039a36ebf9b3a6c632bf1a38c' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\medicament.tpl',
      1 => 1356497786,
      2 => 'file',
    ),
    'd426cae480d5e2e4b7d6210fdc1c6e3a0afa3ed0' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\skeleton.tpl',
      1 => 1356527702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37550daf8ab7ed9d8-13031283',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50daf8ab952303_27900316',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50daf8ab952303_27900316')) {function content_50daf8ab952303_27900316($_smarty_tpl) {?><!DOCTYPE HTML> 
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
                <h2>
                <span>La liste des medicaments</span>
                </h2> 
        </div><!-- Fin .title -->

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

          <!-- Le dataTable qui contient la liste des medicaments -->
          <table id="data_medicament" class="responsive table table-striped table-bordered dataTable">
              <thead>
                  <tr>
                        <th><input type="checkbox" id="selectionner_tout"/>&nbsp;Selectionner</th>
                        <th>Libellé</th>
                        <th >Prix</th>
                        <th >Description</th>
                        <th >Supprimer</th>
                        <th >Modifier</th>
                  </tr>
              </thead>
            <tbody>
              <?php  $_smarty_tpl->tpl_vars['medicament'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['medicament']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tab_medics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['medicament']->key => $_smarty_tpl->tpl_vars['medicament']->value){
$_smarty_tpl->tpl_vars['medicament']->_loop = true;
?>
                  <tr>
                    <td><input type="checkbox" name="choix" value="<?php echo $_smarty_tpl->tpl_vars['medicament']->value->id_medicament;?>
"/></td>
                    <td class="libelle"><?php echo $_smarty_tpl->tpl_vars['medicament']->value->libelle;?>
</td>
                    <td class="prix"><?php echo $_smarty_tpl->tpl_vars['medicament']->value->prix;?>
</td>
                    <td class="description"><?php echo $_smarty_tpl->tpl_vars['medicament']->value->desctiption;?>
</td>
                    <td><img src="supprimer.png" id="<?php echo $_smarty_tpl->tpl_vars['medicament']->value->id_medicament;?>
" class="supp_icon"/></td>
                    <td><img data-id="<?php echo $_smarty_tpl->tpl_vars['medicament']->value->id_medicament;?>
" class="lien_modif" src="modifier.png"/></td>
                  </tr>
              <?php } ?>  
            </tbody>
          </table>

          <!-- Boite de dialogue pour La suppression d'un medicament -->
          <div id="dlg_supp_seul" class="dialogue" title="Suppression d'un medicament" >
              <h3>Voulez vous Supprimer ce Medicament ? </h3>
              <img class="loader" src="load.gif"/>
         </div>

         <!-- Boite de dialogue pour le suppression mutiple des medicaments -->
         <div id="dlg_supp_plus" class="dialogue" title="Suppression de medicaments">
              <h3>ATTENTION : Etes vous surs de vouloir supprimer ce(s) <span id="nbr"></span> medicament(s) ! </h3>
              <img class="loader" src="load.gif"/>
         </div>

         <!-- Boite de dialogue pour l'ajout d'un medicament -->
         <div id="dialog_ajout" class="dialogue" title="Ajout d'un medicament">
            <form method="POST" action="medicament.php" id="ajout_medicament">

              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> liebelle </label>
                  <div class="controls span7">
                    <input id="libelle" type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> Prix </label>
                  <div class="controls span7">
                    <input id="prix" type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> description </label>
                  <div class="controls span7">
                    <input id="description"  type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <input type="submit" class="btn btn-primary" value="Ajouter"/>
                    <button type="button" id="btn_annuler_ajout_medic" class="btn btn-secondary">Annuler</button>
                  </div>
              </div>
              <img class="loader" src="load.gif"/>
            </form>
         </div> <!-- Fin boite de dialogue pour l'ajout de medicament -->

         <!-- Boite de dialogue pour la modification d'un medicament -->
         
         <div id="dialog_modification" class="dialogue" title="Modification du medicament">
            <form method="POST" action="medicament.php" id="modification_medicament">
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> libelle </label>
                  <div class="controls span7">
                    <input id="modif_libelle" type="text" required="required" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> Prix </label>
                  <div class="controls span7">
                    <input id="modif_prix" type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3"> description </label>
                  <div class="controls span7">
                    <input id="modif_description"  type="text" required="" class="span12">
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <div class="controls span7">
                    <input type="text" id="id_medicament" required="" class="span12">
                  </div>
              </div>
              <div class="form-actions row-fluid">
                  <div class="span7 offset3">
                    <input type="submit" class="btn btn-primary" value="Ajouter"/>
                    <button type="button" id="btn_annuler_modif_medic" class="btn btn-secondary">Annuler</button>
                  </div>
              </div>
              <img class="loader" src="load.gif"/>
            </form>
         </div> <!-- Fin boite de dialogue pour l'ajout de medicament -->
         
</div>
</div>
<link rel="stylesheet" type="text/css" href="../css/admin/medicament.css">
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
<script type="text/javascript" src="../scripts/admin/medicament.js"></script>

				</div>
			</div>
		</div>
	</div>
	</body>
</html>

<?php }} ?>