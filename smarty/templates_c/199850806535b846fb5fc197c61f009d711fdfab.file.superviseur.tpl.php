<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:24:15
         compiled from "..\Smarty\templates\sup_admin\superviseur.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1121850dafa7f42d838-52570086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '199850806535b846fb5fc197c61f009d711fdfab' => 
    array (
      0 => '..\\Smarty\\templates\\sup_admin\\superviseur.tpl',
      1 => 1356523905,
      2 => 'file',
    ),
    'b9707c70a8f3fb26b1e1992c3539bcb9c592661f' => 
    array (
      0 => '..\\Smarty\\templates\\sup_admin\\skeleton.tpl',
      1 => 1356527484,
      2 => 'file',
    ),
    'a0c0598784d8ae0bd3ea3a67060d3cd38d1beb3e' => 
    array (
      0 => '..\\Smarty\\templates\\sup_admin\\ajout.tpl',
      1 => 1356525405,
      2 => 'file',
    ),
    '625382155bae5b43a531ca40ec17ed090505b10c' => 
    array (
      0 => '..\\Smarty\\templates\\sup_admin\\dialog_superviseur.tpl',
      1 => 1356518886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1121850dafa7f42d838-52570086',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50dafa7f5dead0_96668244',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50dafa7f5dead0_96668244')) {function content_50dafa7f5dead0_96668244($_smarty_tpl) {?><html>
	<head>
		<meta charset="utf-8">
		<title>MVsync</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="css/images/favicon.png">
		<link href="../css/jquery-ui.css" rel="stylesheet">
		<link href="../css/admin/base.css" rel="stylesheet">
		<link href="../css/admin/style.css" rel="stylesheet">
		<link href="../css/admin/responsive.css" rel="stylesheet">
		<script type="text/javascript" src="../scripts/jquery.js"></script>
		<script type="text/javascript" src="js/ajout.js"></script>
		<script type="text/javascript" src="../scripts/jquery-ui.js"></script>
		<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
	</head>
	<body>
	<div id="sidebar" class="collapse">
		<div class="logo">
	   		<a href="index.html"></a>
		</div>
		<ul id="sidebar_menu" class="navbar nav nav-list sidebar_box">
			<li class="accordion-group active">
				<a class="dashboard" href="delegues.php">
					<img src="img/menu_icons/dashboard.png">Délégué</a>
			</li>
			<li class="accordion-group active">
				<a class="dashboard" href="superviseur.php">
					<img src="img/menu_icons/dashboard.png">Superviseur</a>
			</li>
			<li class="accordion-group active">
				<a class="dashboard" href="comptes.php">
					<img src="img/menu_icons/dashboard.png">Administrateur</a>
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
			<h2>Gestion des superviseurs</h2>
		</div>
		<div class="content top">
			<div class="row-fluid control-group">
				<button id="Ajouter" type="button" class="btn inline">
					<ul class="the-icons unstyled">
						<li><i class="gicon-plus-sign"></i>Ajouter</li>
					</ul>
				</button>
			</div>
			<table id="data_demandes" class="responsive table table-striped table-bordered dataTable">
				<thead>
					<tr>
						<th>Image</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>Adresse</th>
						<th>Fax</th>
						<th>Téléphone</th>
						<th>Email</th>
						<th>Date d'embauche</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['compte'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['compte']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comptes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['compte']->key => $_smarty_tpl->tpl_vars['compte']->value){
$_smarty_tpl->tpl_vars['compte']->_loop = true;
?>
					<tr>
						<td><img src="../upload/<?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->image_url;?>
" width="70" height="70">
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->nom;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->prenom;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->adresse;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->fax;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->tel;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->email;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['compte']->value->Delegue->dateEmbauche;?>
</td>
						<td>
							<div id="<?php echo $_smarty_tpl->tpl_vars['compte']->value->id_compte;?>
" class="modify"></div>
							<a href="index.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['compte']->value->id_compte;?>
">
								<div class="delete"></div>
							</a>
							<div id="<?php echo $_smarty_tpl->tpl_vars['compte']->value->id_delegue;?>
" class="view"></div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="dialog" title="Ajouter un delegue">
		<?php /*  Call merged included template "sup_admin/ajout.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('sup_admin/ajout.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1121850dafa7f42d838-52570086');
content_50dafa7f5473b9_96805311($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "sup_admin/ajout.tpl" */?>
	</div>
	<div id="dialog2" title="Ajouter un delegue">
		<?php /*  Call merged included template "sup_admin/dialog_superviseur.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('sup_admin/dialog_superviseur.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1121850dafa7f42d838-52570086');
content_50dafa7f57ffd9_70165939($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "sup_admin/dialog_superviseur.tpl" */?>
	</div>
<script type="text/javascript">
$(document).ready(function(){
		$("#dialog").dialog({
			minHeight : 300,
			minWidth : 450,
			modal : true,
			autoOpen : false
		});
		$("#dialog2").dialog({
			minHeight : 300,
			minWidth : 450,
			modal : true,
			autoOpen : false
		});
		$('#data_demandes').dataTable({
			"fullPaginate": true,
			"bJQueryUI": true,
			"oLanguage": {
				"sEmptyTable": "No data available in table",
				"sLengthMenu": 'Afficher <select>'+
				'<option value="5">5</option>'+
				'<option value="10">10</option>'+
				'<option value="20">20</option>'+
				'<option value="30">30</option>'+
				'<option value="40">40</option>'+
				'<option value="50">50</option>'+
				'<option value="-1">All</option>'+
				'</select> enregistrement'
			},
		});
		
		$("#Ajouter").click(function(){
			$("#_form").attr("action", "index.php?action=add")
			$("#dialog").dialog("open");
		});
		$(".view").click(function(){
			var id=$(this).attr('id');
			$("#dialog2").dialog("open");
			$.ajax({
				type: 'GET',
				url : 'comptes.php?action=getDelegues',
				data : "id="+id,
				success : function(theResponse){
					$('#dialog2').prepend(theResponse);
				}
			});

		});

		$(".modify").live("click", function(){
			var id=$(this).attr('id');
			$("#_form").attr("action", "index.php?action=modify&id="+id);
			$("#dialog").dialog("open");
			$.ajax({
				type: 'GET',
				url : 'comptes.php?action=getCompte',
				data : "id="+id,
				success : function(theResponse){
					var json = jQuery.parseJSON(theResponse);
					$("#nom").attr("value",json.nom);
					$("#prenom").attr("value",json.prenom);
					$("#adresse").attr("value",json.adresse);
					$("#tel").attr("value",json.tel);
					$("#fax").attr("value",json.fax);
					$("#email").attr("value",json.email);
					$("#dataNaissance").attr("value",json.dataNaissance);
					$("#dateEmbauche").attr("value",json.dateEmbauche);
					$("#user_name").attr("value",json.login);
					$("#user_type").attr("value",json.types);
					$("#etat").attr("value",json.etat);
					//Gestion des droits
					var lesDroits=json.droits.split('|');
					for(var i=0;i<lesDroits.length;i++){
						if(lesDroits[i]=="delegue"){
							$("#gest_delegues").attr('checked','checked');
							}
						else if (lesDroits[i]=="medecin") {
							$("#gest_medecins").attr('checked','checked');
						}
						else if (lesDroits[i]=="statistique") {
							$("#gest_statistiques").attr('checked','checked');
						}
						else if (lesDroits[i]=="medicaments") {
							$("#gest_medicaments").attr('checked','checked');
						}
						else if (lesDroits[i]=="evenements") {
							$("#gest_evenements").attr('checked','checked');
						}
					}

					
				}
			});
		});
	});
</script>

				</div>
			</div>
		</div>
	</div>
	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:24:15
         compiled from "..\Smarty\templates\sup_admin\ajout.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50dafa7f5473b9_96805311')) {function content_50dafa7f5473b9_96805311($_smarty_tpl) {?><form id="_form" class="form-horizontal row-fluid" method="post" enctype="multipart/form-data" >
      <fieldset id="first_div" class="ui-widget-content ui-corner-all">
        <legend>Information concernant le compte</legend>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">Type de l'utilisateur</label>
                  <div class="controls span7">
                      <select data-placeholder="Choisir le type de l'utilisateur" name="user_type"
                      class="chzn-select" id="user_type">
                          <option value=""></option>
                          <option value="Delegue" id="Delegue">D&eacute;legu&eacute; m&eacute;dical
                          </option>
                          <option value="Superviseur" id="Superviseur">Superviseur</option>
                          <option value="Administrateur" id="Administrateur">Administrateur</option>
                      </select>
                  </div>
              </div>
              <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="user_name">Nom d'utilisateur</label>
                  <div class="controls span7">
                           <input type="text" id="user_name" name="user_name" class="row-fluid" placeholder="Taper votre nom d'utilisateur">
                      </div>
                 </div>
                 <div class="form-row control-group row-fluid">
                            <label class="control-label span3" for="password">Mot de passe</label>
                            <div class="controls span7">
                              <input type="password" id="password" name="password" class="row-fluid password" 
                              placeholder="taper votre mot de passe">
                            </div>
                  </div> 
                  
                 <div class="form-row control-group row-fluid ">
                            <label class="control-label span3">Séléctionner les droits</label></br>
                      <div class="controls span7">
                           <label class="checkbox ">
                            <input type="checkbox" value="delegue" name="droits[]" id="gest_delegues">Gestion des delegues</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="medecin" name="droits[]" id="gest_medecins" >Gestion des médecins</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="statistique" name="droits[]" id="gest_statistiques">Gestion des statistiques</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="medicaments" name="droits[]" id="gest_medicaments">Gestion des médicaments</label>
                            <label class="checkbox ">
                                <input type="checkbox" value="evenements" name="droits[]" id="gest_evenements">Gestion des événements</label>
                      </div>
                 </div>
                 <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="default-select">Etat de l'utilisateur</label>
                      <div class="controls span7">
                          <select name="etat" class="chzn-select" id="etat">
                                <option value="0">Active</option>
                                <option value="1">Désactivé</option>
                          </select>
                      </div>
                  </div>
    <!--</div> -->
  </fieldset>
    <fieldset id="second_div" style="display:none">
      <legend>Information concernant l'utilisateur</legend>
              Image:<input type="file" name="imgfile"><br>
          <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="nom">Nom</label>
                    <div class="controls span7">
                         <input type="text" id="nom" name="nom" class="row-fluid" placeholder="Le nom de l'utilisateur">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="prenom">Prénom
                    </label>
                    <div class="controls span7">
                      <input type="text" id="prenom" name="prenom" class="row-fluid" 
                      placeholder="Le prénom de l'utilisateur">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="adresse">Adresse</label>
                    <div class="controls span7">
                         <input type="text" id="adresse" name="adresse" class="row-fluid" 
                         placeholder="adresse de l'utilisateur">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="tel">Téléphone</label>
                    <div class="controls span7">
                         <input type="text" id="tel" name="tel" class="row-fluid" placeholder="le numero de téléphone">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="fax">Fax</label>
                    <div class="controls span7">
                         <input type="text" id="fax" name="fax" class="row-fluid" placeholder="fax">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3" for="email">Email</label>
                    <div class="controls span7">
                         <input type="text" id="email" name="email" class="row-fluid" placeholder="Email">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                    <label class="control-label span3">Date de naissance
                    </label>
                    <div class="controls span7">
                         <input type="text" id="dataNaissance" name="dataNaissance" value="" class="row-fluid"
                         placeholder="veuillez donner la date de naissance">
                    </div>
               </div> 
             <div class="form-row control-group row-fluid">
                    <label class="control-label span3">Date d'embauche</label>
                    <div class="controls span7">
                         <input type="text" id="dateEmbauche" name="dateEmbauche" value="" class="row-fluid" 
                         placeholder="veuiller donner la date d'embauche">
                    </div>
               </div>
               <div class="form-row control-group row-fluid">
                  <label class="control-label span3" for="default-select">Superviseur</label>
                  <div class="controls span7">
                      <select data-placeholder="Choisir son superviseur" name="mySuperviseur"
                      class="chzn-select" id="mySuperviseur">
                      <option></option>
                      <?php  $_smarty_tpl->tpl_vars['super'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['super']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabl']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['super']->key => $_smarty_tpl->tpl_vars['super']->value){
$_smarty_tpl->tpl_vars['super']->_loop = true;
?>
                          <option value="<?php echo $_smarty_tpl->tpl_vars['super']->value->Delegue->id_delegue;?>
"><?php echo $_smarty_tpl->tpl_vars['super']->value->Delegue->nom;?>
</option>
                      <?php } ?>
                      </select>
                  </div>
              </div>
    </fieldset>
      <div id="icon_next" style="display:none">
          <img src="../sup_admin/img/next.png">
      </div>
      <div id="icon_back" style="display:none">
          <img src="../sup_admin/img/back.png">
      </div>
      <div id="lesButton" style="display:none" class="form-actions row-fluid">
                <div class="span7 offset3">
                  <input type="submit" value="Enregistre" class="btn btn-primary">
                  <input id="Quitter"type="button" value="Quitter" class="btn btn-secondary">
                </div>
      </div>
</form><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:24:15
         compiled from "..\Smarty\templates\sup_admin\dialog_superviseur.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50dafa7f57ffd9_70165939')) {function content_50dafa7f57ffd9_70165939($_smarty_tpl) {?>
<script>
        $("#Quitter").click(function(){
          $("#dialog2").dialog("close");
        });
    $("#client").autocomplete({
      source: "comptes.php?action=getCompte",
      minLength: 2,
      select: function(event, ui) {
        alert(ui);
          }
      });
</script>

<form id="_superviseur" class="form-horizontal row-fluid" method="post" enctype="multipart/form-data">
    <fieldset id="second_div" style="display:none">
      <legend>Mes délégues </legend>
        <table id="data_demandes" class="responsive table table-striped table-bordered dataTable">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php  $_smarty_tpl->tpl_vars['delegue'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delegue']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['delegues']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['delegue']->key => $_smarty_tpl->tpl_vars['delegue']->value){
$_smarty_tpl->tpl_vars['delegue']->_loop = true;
?>
            <tr>
              <td><?php echo $_smarty_tpl->tpl_vars['delegue']->value->nom;?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['delegue']->value->prenom;?>
</td>
              <td>
                <a href="index.php?action=delete&id=<?php echo $_smarty_tpl->tpl_vars['compte']->value->id_compte;?>
">
                  <div class="delete"></div>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table> 
    </fieldset>
</form>
<?php }} ?>