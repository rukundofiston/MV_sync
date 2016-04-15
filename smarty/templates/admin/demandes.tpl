{extends file="admin/skeleton.tpl"}{/extends}
{block name="content"}
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
			<table id="data_medecins" class="responsive table table-striped table-bordered dataTable">
				<thead>
					<tr>
						<th>Selectionner</th>
						<th>Nom</th>
						<th>Prenom</th>
						<th>adresse</th>
						<th>Fax</th>
						<th>telephone</th>
						<th>sexe</th>
						<th>civilite</th>
						<th>Email</th>
						<th>Supprimer</th>
						<th>Modifier</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$tab item=medecin}
						<tr>
							<td><input type="checkbox" name="choix" value="{$medecin->id_medecin}"/></td>
							<td>{$medecin->nom}</td>
						    <td>{$medecin->prenom}</td>
							<td>{$medecin->adresse}</td>
							<td>{$medecin->fax}</td>
							<td>{$medecin->tel}</td>
							<td>{$medecin->sexe}</td>
							<td>{$medecin->civilite}</td>
							<td>{$medecin->email}</td>
							<td><img src="supprimer.png" id="{$medecin->id_medecin}" class="lien_supp"/></td>
							<td><img data-id="{$medecin->id_medecin}" data-photo="{$medecin->photo}"class="lien_modif" src="modifier.png"/></td>
						</tr>
					{/foreach}	

				</tbody>
			</table>
		</div>
	</div>
	<div id="dialog_ajout" class="dialogue" title="Ajouter un médecin">
		{include file='admin/index.tpl'}
	</div>
	<div id="dialog_modif" class="dialogue" title="Modifer le médecin">
		{include file='admin/modif_med.tpl'}
	</div>
	<div id="dialog_suppr_seul" class="dialogue" title="Supprimer un Medecin">
		<h3>Voulez vous Supprimer ce Medecin ? </h3>
		<img class="loader" src="load.gif"/>
	</div>
	<div id="dialog_suppr_plusieurs" class="dialogue" title="Supprimer un Medecin">
		<h3>ATTENTION : Vous etes sur le point de supprimer <span id="nbr_med_suppr"></span> Medecins ! </h3>
		<img class="loader" src="load.gif"/>
	</div>
	<div id="dialog_ajout_loc_med" class="dialogue" title="Localiser le medecin">
			<div id="googleMap" style="width: 80%; height: 90%; margin-left:10%; margin-right:10%;"></div>
			<button id="btn_localisattion" style="margin-left:40%; margin-top:3%;">Enregistrer</button>
			<img class="loader" src="load.gif"/>
	</div>
	<style type="text/css">
		.loader{
			margin-left: 45%;
		}
	</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	
<script type="text/javascript" src="../scripts/admin/jquery.dataTables.js"></script>
	<script type="text/javascript">

	$(document).ready(function() {
		$("#dialog_ajout").dialog({
			minHeight : 300,
			minWidth : 500,
			modal : true,
			autoOpen : false
		});
		$("#dialog_modif").dialog({
			autoOpen : false});
		$("#dialog_suppr_seul").dialog({
			autoOpen : false});
		$("#dialog_suppr_plusieurs").dialog({
			autoOpen : false});
		$("#dialog_ajout_loc_med").dialog({
			minHeight : 300,
			minWidth : 500,
			modal : true,
			autoOpen : false,
			resizeStop: function(event, ui) {literal} {google.maps.event.trigger(map, 'resize')},
			open: function(event, ui) {google.maps.event.trigger(map, 'resize'); } {/literal},
		});
//*********************Google Map ***********************************************//
 
		var latLng = new google.maps.LatLng(31.6373,-8.0175); // Correspond au coordonnées de Marrakech
  var myOptions = {
    zoom      : 16,
    center    : latLng,
    mapTypeId : google.maps.MapTypeId.ROADMAP, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
    maxZoom   : 20
  };
 
  map  = new google.maps.Map(document.getElementById('googleMap'), myOptions);
  var marker =new google.maps.Marker({
  	draggable: true,
  	position : latLng,
  	map : map,
  	icon : 'logo_med.png',
  	title : 'Glissez Moi'
 	}); 

  google.maps.event.addListener(marker,'drag',function(){
  	getPosition();

  });
  function getPosition(){
  	var pos=marker.getPosition();
  	return pos;
}

  $('#btn_localisattion').click(function(){
  	$('#dialog_ajout_loc_med .loader').css('display','inline');
  	var lat=getPosition().lat();
  	var lng=getPosition().lng();
  	var id=$('tr td input[type=checkbox] :last').attr('value');
  	
  	$.ajax({
				type: 'POST',	
				url: 'enregistrer_loc_med.php',
				data: 'id='+id+'&lat='+lat+'&lng='+lng,
				async: false,
				cache: false,
				success: function()
					{
					$('#dialog_ajout_loc_med').dialog("close");
					}
				});
  	
  });

//*********************Suppression d'un seul medecin medecin **********************//

		$('.lien_supp').live("click",function(){
			$('#dialog_suppr_seul .loader').css('display','none');
			$( "#dialog_suppr_seul" ).dialog( "option", "modal", true );
			$("#dialog_suppr_seul").dialog("open");

			var id_med=$(this).attr('id');
			var data_id='id='+id_med;
			$("#dialog_suppr_seul").dialog({
			minHeight : 100,
			minWidth : 500,
			modal : true,
			autoOpen : false,
			buttons: {
			"Oui": function() {
				$("#dialog_suppr_seul .loader").css('display','inline');
				$.ajax({
				type: 'POST',	
				url: 'supprimer.php',
				data: data_id,
				cache: false,
				success: function()
					{
					$('#dialog_suppr_seul').dialog("close");
					cellule=$('#'+id_med).parent();
					ligne=cellule.parent();
					ligne.hide("normal");
					}
				
				});
			},
			"Annuler": function() {
			$(this).dialog("close");
			}
 		    }
	});
});

//*********************Suppression de plusieurs medecins **********************//
$('#Supprimer').click(function()
{
		    var tab_supp=new Array();
		 	$('input[type="checkbox"]').each(function(){
		 		if($(this).attr('checked'))
		 		{
		 			tab_supp.push($(this).attr('value'));
		 		}
		 	});
		 	if(tab_supp.length == 0)
		 	{
		 		alert('Vous n\'avez Selectionner Aucun element');
		 	}
		 	else{
		 		alert(tab_supp.length);
		 		$("#dialog_suppr_plusieurs .loader").css('display','none');
		 		$('#nbr_med_suppr').text(tab_supp.length);
		 		$( "#dialog_suppr_plusieurs" ).dialog( "option", "modal", true );
		 		$("#dialog_suppr_plusieurs").dialog("open");
		 		//Description de la boite de dialogue
		 		$("#dialog_suppr_plusieurs").dialog({
					minHeight : 100,
					minWidth : 700,
					modal : true,
					autoOpen : false,
					buttons: 
					{
						"Oui": function() 
						{
							$("#dialog_suppr_plusieurs .loader").css('display','inline');
							$.ajax(
							{
								type: 'POST',	
								url: 'suppr_total_med.php',
								data: { medArray : tab_supp },
								async: false,
								cache: false,
								success: function()
								{
									$("#dialog_suppr_plusieurs").dialog("close");
									$('input[type="checkbox"]').each(function()
									{
								 		if($(this).attr('checked'))
									 		{
											var cellule=$(this).parent();
											var ligne=cellule.parent();
											ligne.hide("slow");
									 		}
					 				});
								}


							});
							
			 			},// femeture "oui" function

					 	"Annuler": function()
					 	{
							$(this).dialog("close");
						}
					}
				 });// fermeture de dialog
			}//femeture de else
		//tab_supp=new Array();
			
});
//****************************************************************//
$("#btn_ajout_med").click(function(){

   var nom=$('#nom').val();
   var prenom=$('#prenom').val();
   var adresse=$('#adr').val();
   var email=$('#email').val();
   var telephone=$('#tel').val();
   var fax=$('#fax').val();
   var sexe=$('input[type=radio][name=sexe]:checked').attr('value');
   var civilite=$("#civilite option:selected").val(); 
   var photo=$('#uploads img').attr('data-nom');
   if(photo == "")
   {
   	alert("Vous devez Ajouter une photo Pour Continuer");
   }
   else{
   				$("#dialog_ajout .loader").css('display','inline');
   				$.ajax({

				type: 'POST',	
				url: 'ajouter.php',
				data: 'nom='+nom+'&prenom='+prenom+'&adresse='+adresse+'&email='+email+'&telephone='+telephone+'&fax='+fax+'&sexe='+sexe+'&civilite='+civilite+'&photo='+photo,
				async: false,
				cache: false,
				success: function(html)
					{	
						$('#data_medecins').append(html).fadeIn("slow");
						$('#dialog_ajout').dialog("close");
						$("#dialog_ajout_loc_med").dialog( "option", "width",800 );
					  	$("#dialog_ajout_loc_med").dialog( "option", "height",350 );
					  	$("#dialog_ajout_loc_med .loader").css('display','none');
						$('#dialog_ajout_loc_med').dialog("open");


					}
				
				});
		}
				return false;
  
});


















//*****************************************************************************
		$('button').button();
		$('#data_medecins').dataTable({
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
			$("#dialog_ajout").dialog("open");
			$("#dialog_ajout .loader").css('display','none');
		});
	
		
	});
	</script>
{/block}