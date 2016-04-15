<?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:05:28
         compiled from "..\Smarty\templates\task.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1052950daf618130c07-21526127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f5b9a3cf766d82064724a29b48287326fea8591' => 
    array (
      0 => '..\\Smarty\\templates\\task.tpl',
      1 => 1356519133,
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
  'nocache_hash' => '1052950daf618130c07-21526127',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50daf6184557d6_91769343',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50daf6184557d6_91769343')) {function content_50daf6184557d6_91769343($_smarty_tpl) {?><!doctype html>
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
	
	<script type="text/javascript" src="../scripts/main.tasks.js"></script>
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUi4q1aK4mLnb5yo1LUKOHIqEGylj0BMk&sensor=true"></script>
		
		
	<?php $_smarty_tpl->tpl_vars['backUrl'] = new Smarty_variable('tasks.php', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['headerName'] = new Smarty_variable('Visite', null, 0);?>
	<?php $_smarty_tpl->tpl_vars['home'] = new Smarty_variable(true, null, 0);?>
	<?php /*  Call merged included template "header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1052950daf618130c07-21526127');
content_50daf618254be6_93071932($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "header.tpl" */?>
	<div data-role="content" data-theme="a" style="height : 100%, padding-bottom: 100%">
		<div class="task-header">
			<div class="left"><img class="profil-pic" src="../images/profils/<?php echo $_smarty_tpl->tpl_vars['doctor']->value->photo;?>
"></div>
			<div class="task-description">
				<p>Nom : Dr. <?php echo $_smarty_tpl->tpl_vars['doctor']->value->nom;?>
 <?php echo $_smarty_tpl->tpl_vars['doctor']->value->prenom;?>
</p>
				<p>Sp&eacute;cialit&eacute; : Cardiologue</p>
			</div>
		</div>
		<br>
		<div data-role="collapsible">
			<h3 onclick="initialize()" >Trajet</h3>
				<script type="text/javascript">
					var v = 0;
					var marker;
					var myPosition;
					navigator.geolocation.getCurrentPosition(function(position){
						myPosition = position;
						console.log("Latitude : " + position.coords.latitude + ", longitude : " + position.coords.longitude);
					});
					function initialize(){
						if(v==0){
							console.log(myPosition.coords.latitude);	
							v =1;
							var image = '../images/mark.png';
							var otherLatlng = new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['doctor']->value->lat;?>
, <?php echo $_smarty_tpl->tpl_vars['doctor']->value->lng;?>
);
							var myLatlng = new google.maps.LatLng(myPosition.coords.latitude,myPosition.coords.longitude);
							var mapOptions = {
								center: myLatlng,
								zoom: 10,
								mapTypeId: google.maps.MapTypeId.ROADMAP 
							};
							var map = new google.maps.Map(document.getElementById("map_canvas"),
							mapOptions);

							var directionsRenderer = new google.maps.DirectionsRenderer();
							directionsRenderer.setMap(map);
							directionsRenderer.setPanel(document.getElementById('directionsPanel'));

							var directionsService = new google.maps.DirectionsService();
							var request = {
							origin: myLatlng,
							destination: otherLatlng,
							travelMode: google.maps.DirectionsTravelMode.DRIVING
							};
							var marker = new google.maps.Marker({
								position: otherLatlng,
								map: map,
								icon : image,
								animation: google.maps.Animation.DROP,
							});
							directionsService.route(request, function(response, status) {
								if (status == google.maps.DirectionsStatus.OK) {
									directionsRenderer.setDirections(response);
								}else {
									alert('Error: ' + status);
								}
							});
						}
					}
				</script>
				<div id="map_canvas" style="width:100%; height:400px; background:#000;">
				</div>
				<div id="directionsPanel"></div>
		</div>
		<div data-role="collapsible">
			<h3>Medicaments</h3>
			<div data-role="collapsible-set" class="drugs">
				<?php if (count($_smarty_tpl->tpl_vars['drugs']->value)>0){?>
				<?php  $_smarty_tpl->tpl_vars['drug'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['drug']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['drugs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['drug']->key => $_smarty_tpl->tpl_vars['drug']->value){
$_smarty_tpl->tpl_vars['drug']->_loop = true;
?>
					<div data-role="collapsible" >
						<h3><?php echo $_smarty_tpl->tpl_vars['drug']->value->Medicament->libelle;?>
</h3>
						<p><?php echo $_smarty_tpl->tpl_vars['drug']->value->Medicament->desctiption;?>
</p>
					</div>
				<?php } ?>
				<?php }else{ ?>
					<p class="parag">vous n'avez pas choisi des m&eacute;dicaments</p>
				<?php }?>
			</div>		
			<?php if ($_smarty_tpl->tpl_vars['visite']->value->etat==-1){?>
			<p><a href="tasks.php?action=drugs-select" data-rel="dialog">Ajouter Medicament</a></p>
			<?php }?>
		</div>
		<div data-role="collapsible" id="note-div">
			<h3>Notes</h3>
				<?php if ($_smarty_tpl->tpl_vars['visite']->value->note==''){?>
					<div class="note-div2"><textarea name="note" id="note-area" placeholder="Ajouter une note pour cette visite"></textarea></div>
					<div class="button"><a id="addNote" type="confirm" data-role="button" class="medium-button">Ajouter</a></div>
				<?php }else{ ?>
					<div class="note-div2"><p><?php echo $_smarty_tpl->tpl_vars['visite']->value->note;?>
</p></div>
					<a id="addNote" type="modify" data-role="button">modifier</a>
				<?php }?>
				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['visite']->value->id_visite;?>
" id="id_visite">
		</div>
		<div data-role="collapsible">
			<h3>Demandes</h3>
			<div data-role="collapsible-set" class="demandesCollapse">
				<?php  $_smarty_tpl->tpl_vars['demande'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['demande']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['demandes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['demande']->key => $_smarty_tpl->tpl_vars['demande']->value){
$_smarty_tpl->tpl_vars['demande']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['demande']->value->etat==-1){?><?php $_smarty_tpl->tpl_vars['theme'] = new Smarty_variable("a", null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['demande']->value->etat==0){?> <?php $_smarty_tpl->tpl_vars['theme'] = new Smarty_variable("d", null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['demande']->value->etat==1){?> <?php $_smarty_tpl->tpl_vars['theme'] = new Smarty_variable("c", null, 0);?>
					<?php }elseif($_smarty_tpl->tpl_vars['demande']->value->etat==2){?> <?php $_smarty_tpl->tpl_vars['theme'] = new Smarty_variable("b", null, 0);?>
					<?php }?>
					<div data-role="collapsible" data-theme="<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
" id="collapsible_<?php echo $_smarty_tpl->tpl_vars['demande']->value->id_demande;?>
">
						<h3><?php echo $_smarty_tpl->tpl_vars['demande']->value->objet;?>
</h3>
						<p><?php echo $_smarty_tpl->tpl_vars['demande']->value->description;?>
</p>
						<a data-icon="delete" data-rel="popup" data-transition="pop" href="#confirmDialog" data-role="button" id="<?php echo $_smarty_tpl->tpl_vars['demande']->value->id_demande;?>
" class="deleteButton">Supprimer</a>
					</div>
				<?php } ?>
			</div>
			<form id="formDemande">
			<div data-role="fieldcontain">
				<input type="text" name="type" id="objet">
			</div>
				<textarea name="description" id="descDemande" placeholder="Description"></textarea>
			</form>
			<a id="addDemande" data-role="button" class="medium-button">Ajouter</a>
		</div>
		<?php if ($_smarty_tpl->tpl_vars['visite']->value->etat!=0){?>		
		<div  id="delayDialog" data-role="popup" data-overlay-theme="d" data-theme="b"  data-tolerance="15,15">
			<div data-role="header">
				<h1>Reporter la visite</h1>
			</div>
			<div class="ui-content" data-role="content">
				<p style="padding : 10px;">Choisir la date  : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
				<input type="date" name="delayDate" >
				<a data-role="button" id="delayButton" data-theme="b">Reporter</a>
				<a data-role="button" id="delayNo" data-theme="c">Annuler</a>
				<div class="error"><div class="loading"></div><h3></h3></div>
			</div>
		</div>
		<?php }?>
		<div  id="confirmDialog" data-role="popup" data-overlay-theme="d" data-theme="b"  data-tolerance="15,15">
			<div data-role="header">
				<h1>Confirmation</h1>
			</div>
			<div class="ui-content">
				<p style="padding : 10px;">Voullez vous vraiment supprimer cette demande?</p>
				<a data-role="button" id="deleteYes" data-theme="b">Oui</a>
				<a data-role="button" id="deleteNo" data-theme="c">Non</a>
			</div>
		</div>
		<div  id="cancelDialog" data-role="popup" data-overlay-theme="d" data-theme="b"  data-tolerance="15,15">
			<div data-role="header">
				<h1>Confirmation</h1>
			</div>
			<div class="ui-content">
				<p style="padding : 10px;">Voullez vous vraiment annuler cette demande?</p>
				<a data-role="button" id="cancelYes" data-theme="b">Oui</a>
				<a data-role="button" id="cancelNo" data-theme="c">Non</a>
			</div>
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['visite']->value->etat==-1){?>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="tasks.php?action=finish&id=<?php echo $_smarty_tpl->tpl_vars['visite']->value->id_visite;?>
">Terminer</a></li>
				<li><a href="#delayDialog" data-rel="popup" data-transition="pop" data-role="button">Repporter</a></li>
				<li><a href="#cancelDialog" data-rel="popup" data-transition="pop" data-role="button">Annuler</a></li>
			</ul>
		</div>
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['visite']->value->etat==0){?>
	<div data-role="footer" data-position="fixed" data-theme="e">
		<h2>Cette visite est termin&eacute;e</h2>
	</div>
	<?php }elseif($_smarty_tpl->tpl_vars['visite']->value->etat==-2){?>
	<div data-role="footer" data-position="fixed" data-theme="b">
		<h2>Cette visite est annul&eacute;e</h2>
	</div>
	<?php }?>
</div>
<div data-role="page" id="response" data-theme="b">
	<div data-role="header">
		<h1></h1>
	</div>
	<div data-role="content">
		<h1></h1>
		<p></p>
	</div>
</div>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2012-12-26 13:05:28
         compiled from "..\Smarty\templates\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_50daf618254be6_93071932')) {function content_50daf618254be6_93071932($_smarty_tpl) {?><div data-role="header">
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