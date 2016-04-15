<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:20:47
         compiled from "..\Smarty\templates\admin\evenement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2817250daf9af0cbca0-31986714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c0ea9842bf69d02960887c7a381fd13c9b25d2' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\evenement.tpl',
      1 => 1356501868,
      2 => 'file',
    ),
    'd426cae480d5e2e4b7d6210fdc1c6e3a0afa3ed0' => 
    array (
      0 => '..\\Smarty\\templates\\admin\\skeleton.tpl',
      1 => 1356527702,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2817250daf9af0cbca0-31986714',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50daf9af231176_32523923',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50daf9af231176_32523923')) {function content_50daf9af231176_32523923($_smarty_tpl) {?><!DOCTYPE HTML> 
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
					
        <div class="row-fluid control-group">
            <button id="ajouter" type="button" class="btn inline">
              <ul class="the-icons unstyled">
                <li><i class="gicon-plus-sign"></i> Ajouter</li>
              </ul>
        </div>
  <!-- Le dataTable qui contient la liste des demandes -->
          <table id="data_evenement" class="responsive table table-striped table-bordered dataTable">
              <thead>
                  <tr>
                        <th >Titre</th>
                        <th >Description</th>
                        <th>Lieu</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th >Heure debut</th>
                        <th >Heure fin</th>
                        <th >Delegué</th>
                  </tr>
              </thead>
            <tbody>
              <?php  $_smarty_tpl->tpl_vars['evenement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['evenement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['evenements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['evenement']->key => $_smarty_tpl->tpl_vars['evenement']->value){
$_smarty_tpl->tpl_vars['evenement']->_loop = true;
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['event']->titre;?>
</td>
                  	<td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['event']->description;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['event']->lieu;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['event']->dataD;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['event']->dateF;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['event']->heureD;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['event']->heureF;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['evenement']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['evenement']->value['prenom'];?>
</td>
                  </tr>
              <?php } ?>  
            </tbody>
          </table>
         <!-- Boite de dialogue pourl'ajout d'un evenement -->
         <div id="dialog_ajout_event" class="dialogue" title="Ajoutd'un evenement ">
         <form method="POST" action="" id="form_ajout_event">
          <div class="form-row control-group row-fluid">
            <label class="control-label span3" for="titre">
             Titre :
            </label>
            <div class="controls span7">
              <input id="titre" type="text" required="" class="span12">
            </div>
          </div>
          <div class="form-row control-group row-fluid">
            <label class="control-label span3" for="cname">
             Date de debut :
            </label>
            <div class="controls span7">
              <input id="dateD" type="text" required="" class="span12">
            </div>
          </div>

          <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Date de fin  :
            </label>
            <div class="controls span7">
              <input id="dateF" type="text" required="" class="span12">
            </div>
          </div>
          <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Heure de debut :
            </label>
            <div class="controls span7">
              <input id="heureD" type="text" required="" placeholder="hh:mm" class="span12">
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Heure de fin :
            </label>
            <div class="controls span7">
              <input id="heureF" type="text" required="" placeholder="hh:mm" class="span12">
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
             Description :
            </label>
            <div class="controls span7">
              <textarea id="description" required="" class="span12"></textarea>
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Lieu :
            </label>
            <div class="controls span7">
              <input id="lieu" type="text" required="" class="span12">
            </div>
          </div>
           <div class="form-row control-group row-fluid">
            <label class="control-label span3">
              Delegué(<i>optionnel</i>)
            </label>
            <div class="controls span7">
              <input id="delegue" type="text" data-id="" class="span12">
              <div id="display"></div>
            </div>
          </div>
					<div class="form-actions row-fluid">
  						<div class="span7 offset3">
  							<input id="btn_modification_etat" type="submit" class="btn btn-primary" value="Enregister"/>
  							<button type="button" id="btn_annuler_modification_etat" class="btn btn-secondary">Annuler</button>
  					  </div>
					</div>
						<img class="loader" src="load.gif"/>
         </div> <!-- Fin boite de dialogue 
           <script type="text/javascript" src="../scripts/admin/timePicker/lib/base.js"></script>
           <script type="text/javascript" src="../scripts/admin/timePicker/jquery.timepicker.js"></script>
            -->

<link rel="stylesheet" type="text/css" href="../css/admin/evenement.css">
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
<script type="text/javascript" src="../scripts/admin/evenement.js"></script>

				</div>
			</div>
		</div>
	</div>
	</body>
</html>

<?php }} ?>