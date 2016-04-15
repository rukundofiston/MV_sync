<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:20:27
         compiled from "..\Smarty\templates\admin\demande.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1799750daf99be61f61-26255971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbc37393eb31a7b9ae5757c7bbccf0664127b7ea' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\demande.tpl',
      1 => 1356499554,
      2 => 'file',
    ),
    'd426cae480d5e2e4b7d6210fdc1c6e3a0afa3ed0' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\skeleton.tpl',
      1 => 1356527702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1799750daf99be61f61-26255971',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50daf99c07b3e4_87504404',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50daf99c07b3e4_87504404')) {function content_50daf99c07b3e4_87504404($_smarty_tpl) {?><!DOCTYPE HTML> 
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
					
  <!-- Le dataTable qui contient la liste des demandes -->
          <table id="data_demande" class="responsive table table-striped table-bordered dataTable">
              <thead>
                  <tr>
                  		<th>Visualiser</th>
                        <th>Date</th>
                        <th >Medecin</th>
                        <th >Objet</th>
                        <th >Description</th>
                        <th >Etat</th>
                  </tr>
              </thead>
            <tbody>
              <?php  $_smarty_tpl->tpl_vars['demande'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['demande']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['demandes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['demande']->key => $_smarty_tpl->tpl_vars['demande']->value){
$_smarty_tpl->tpl_vars['demande']->_loop = true;
?>
                  <tr>
                  	<td class="voir">Voir</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['demande']->value['date'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['demande']->value['medecin'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['demande']->value['objet'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['demande']->value['description'];?>
</td>
                    <?php if ($_smarty_tpl->tpl_vars['demande']->value['etat']=="En cours"){?>
                    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("en_cours", null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['demande']->value['etat']=="Non vue"){?>
                    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("non_vue", null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['demande']->value['etat']=="Acceptée"){?>
                    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("accept", null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['demande']->value['etat']=="Refusée"){?>
                    <?php $_smarty_tpl->tpl_vars["class"] = new Smarty_variable("refus", null, 0);?>
                    <?php }?>
                    <td class="etat " id="<?php echo $_smarty_tpl->tpl_vars['demande']->value['id'];?>
"><div class="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
 status"><?php echo $_smarty_tpl->tpl_vars['demande']->value['etat'];?>
</div></td>
                  </tr>
              <?php } ?>  
            </tbody>
          </table>
           <!-- Boite de dialogue pour la modification de l'etat d'une demande -->
         <div id="dialog_modification_etat" class="dialogue" title="Modification de l'etat d'une demande">
							 <div class="form-row control-group row-fluid">
				                <label class="control-label span3" for="default-select">Etat</label>
				                <div class="controls span7">
				                  	<select id="etat">
				                  			<option value="0">En cours</option>
				                  			<option value="1">Acceptée</option>
				                  			<option value="2">Refusée</option>
				                  	</select>
		               			</div>
	              		 </div>
	              		 <input id="demande_id" type="hidden"/>
					   	<div class="form-actions row-fluid">
  							<div class="span7 offset3">
  								<input id="btn_modification_etat" type="submit" class="btn btn-primary" value="Enregister"/>
  								<button type="button" id="btn_annuler_modification_etat" class="btn btn-secondary">Annuler</button>
  					  	</div>
						</div>
						<img class="loader" src="load.gif"/>
         </div> <!-- Fin boite de dialogue -->

         <!--Boite de dialogue dans la quelle on visulise en detail les demandes des medecins -->
          <div id="dialog_voir_demande" class="dialogue" title="Visualisation d'une demande">      	
         </div> <!-- Fin boite de dialogue -->
         <img class="load" src="loader.gif"/>
<link rel="stylesheet" type="text/css" href="../css/admin/demande.css">
<link rel="stylesheet" type="text/css" href="../css/admin/style.css">
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
<script type="text/javascript" src="../scripts/admin/demande.js"></script>

				</div>
			</div>
		</div>
	</div>
	</body>
</html>

<?php }} ?>