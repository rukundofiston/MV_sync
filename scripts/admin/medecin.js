$(function(){
function change_tr(elem, id){
	$("#tr_"+id+" ."+elem).text($('#'+elem).val());
}
//******************************** Configuration du plugin du dataTable *********************************//
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
//-------------------------------------------------------------------------------------------------------//

//*********************** Configuration des widgets de jquery UI : Les dialogs *************************//
$("#dialog_ajout_modif").dialog({
			minHeight : 300,
			minWidth : 500,
			modal : true,
			autoOpen : false
		});
		
$("#dialog_suppr_seul").dialog({autoOpen : false});
$("#dialog_suppr_plusieurs").dialog({autoOpen : false});
$("#dialog_ajout_loc_med").dialog({
	minHeight : 300,
	minWidth : 500,
	modal : true,
	autoOpen : false,
	resizeStop: function(event, ui){google.maps.event.trigger(map, 'resize')},
	open: function(event, ui) {google.maps.event.trigger(map, 'resize');}
});
//-----------------------------------------------------------------------------------------------------------------------//

//*********************************** Ajout et Modification d'un medecin ************************************************//
//lors du click sur le boutton "Ajouter"
$("#Ajouter").live('click',function(){
	$('#dialog_ajout_modif').dialog('option','title','Ajout d\'un Medecin');
	$('#dialog_ajout_modif').dialog('open');
	$('#add_form').attr('data-type','ajouter');
	$('#nom').val('');
	$('#prenom').val('');
	$('#adr').val('');
	$('#email').val('');
	$('#tel').val('');
	$('#fax').val('');
});

//Processus de verification et d'enregistrement du medecin  
$("#add_form").submit(function(){
	var action=	$('#add_form').attr('data-type');
	if(action =="ajouter")  //Dans le cas d'ajout d'un medecin 
	{
		var data=$("#add_form").serialize();
	   	var photo=$('#uploads img').attr('data-nom');
	   	if ( typeof(photo) == "undefined" )
	   	{
	   		photo="";
	   	}
	    var count = $("#type :selected").length;
	    if(count > 2)
	  	{
	  		alert('Vous avez selectionnez Plus de 2 Specialités');
	  	}
	  	else{
        $("#dialog_ajout_modif .loader").css('display','inline');

   				$.ajax({
				type: 'POST',	
				url: 'medecin.php',
				data: data+'&action='+action+'&photo='+photo,
				async: false,
				cache: false,
				success: function(html)
					{
						$('#data_medecins').append(html).fadeIn("slow");
						$('#dialog_ajout_modif .loader').css('display','none');
						$('#dialog_ajout_modif').dialog("close");
						$("#type option:selected").attr('selected','');
						$('#btn_localisattion').attr('data-action','ajouter');
						$("#dialog_ajout_loc_med").dialog( "option", "width",800 );
					  	$("#dialog_ajout_loc_med").dialog( "option", "height",350 );
					  	$("#dialog_ajout_loc_med .loader").css('display','none');
						$('#dialog_ajout_loc_med').dialog("open");
					}
				
				});
			}
	}// fin d'ajout
		else if(action == "modifier") //Dans le cas de la modification 
		{
			id=$('#add_form').attr('data-id');
			var data=$("#add_form").serialize();
			var photo=$('#uploads img').attr('data-nom');
		   	if ( typeof(photo) == "undefined" )
		   	{
		   		photo="";
		   	}
			$("#dialog_ajout_modif .loader").css('display','inline');
   				$.ajax({
				type: 'POST',	
				url: 'medecin.php',
				data: data+'&action='+action+'&id='+id+'&photo='+photo,
				async: false,
				cache: false,
				success: function(html){	
						$('#dialog_ajout_modif loader').css('display','none');
						$('#dialog_ajout_modif').dialog("close");
						$('#btn_localisattion').attr('data-action','modifier');
						$('#btn_localisattion').attr('data-id',id);
						$("#dialog_ajout_loc_med .loader").css('display','none');
						$('#dialog_ajout_modif').dialog("close");
						$("#dialog_ajout_loc_med").dialog( "option", "width",800 );
					  	$("#dialog_ajout_loc_med").dialog( "option", "height",350 );
					  	$("#dialog_ajout_loc_med .loader").css('display','none');
						$('#dialog_ajout_loc_med').dialog("open");
						change_tr("nom", id);
						change_tr("prenom", id);
						change_tr("adr", id);
						change_tr("tel", id);
						change_tr("email", id);
						change_tr("tel", id);
						change_tr("fax", id);
						$("#tr_"+id+" .type").text($('#type option:selected').text());
						$("#tr_"+id+" .type").attr('data-type1', $('#type').val());
						//$("#tr_"+id+" .nom").text($('#nom').val());
						/*var nom=$('#nom').val();
						var prenom=$('#prenom').val();
						var adresse=$('#adr').val();
						var fax=$('#fax').val();
						var telephone=$('#tel').val();
						var email=$('#email').val();
						var type=$('#type option:selected').text();
						var sexe=$('input[type=radio] :checked').text();
						var civilite=$('#civilite option:selected').text();
						alert(sexe);
						var cel=$('#'+id).parent();
						var lign=cel.parent();
						var nom=lign.find('.nom').text();
						var prenom=lign.find('.prenom').text();
						var adresse=lign.find('.adresse').text();
						var fax=lign.find('.fax').text();
						var telephone=lign.find('.tel').text();
						var email=lign.find('.email').text();
						var type1=lign.find('.type').attr('data-type1');
						var type2=lign.find('.type').attr('data-type2');
						var sexe=lign.find('.sexe').text();
						var civilite=lign.find('.civilite').text();*/
					}
				});
		}
		return false;
  
});
//-----------------------------------------------------------------------------------------------------------------------------------------//

//****************************************** Ajout de la localisation d'un medecin ********************************************************//
  var latLng = new google.maps.LatLng(31.6373,-8.0175); // Correspond au coordonnées de Marrakech:Emplacement initial de la carte
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
  	var action=$('#btn_localisattion').attr('data-action');
  	if(action == 'ajouter'){
  		var id=$('tr td input[type=checkbox] :last').attr('value');
  	}
  	else{
  		var id=$('#btn_localisattion').attr('data-id');
  	}
  	$.ajax({
				type: 'POST',	
				url: 'medecin.php',
				data: 'action=localiser&id='+id+'&lat='+lat+'&lng='+lng,
				async: false,
				cache: false,
				success: function()
					{
					$('#dialog_ajout_loc_med').dialog("close");
					}
				
				});
  	
});
//-----------------------------------------------------------------------------------------------------------------------------------------//
//*********************************************** Modification du profil d'un medecin *****************************************************///
$('.lien_modif').live('click',function(){
	$('#dialog_ajout_modif').dialog('option','title','Modifier le profil du Medecin');
	$('#dialog_ajout_modif').dialog('open');
	$('#add_form').attr('data-type','modifier');
	var id=$(this).attr('data-id');
	$('#add_form').attr('data-id',id);
	var cel=$('#'+id).parent();
	var lign=cel.parent();
	var nom=lign.find('.nom').text();
	var prenom=lign.find('.prenom').text();
	var adresse=lign.find('.adresse').text();
	var fax=lign.find('.fax').text();
	var telephone=lign.find('.tel').text();
	var email=lign.find('.email').text();
	var type1=lign.find('.type').attr('data-type1');
	var sexe=lign.find('.sexe').text();
	var civilite=lign.find('.civilite').text();

	$('#nom').val(nom);
	$('#prenom').val(prenom);
	$('#adr').val(adresse);
	$('#fax').val(fax);
	$('#tel').val(telephone);
	$('#email').val(email);

	$("#type option:selected").attr('selected','selected');
	
	$("input[name=sexe][value='"+sexe+"']").attr('checked','checked');
	$("#civilite option[value='"+civilite+"']").attr('selected','selected');

});

//Annuler L'operation d'ajout ou de modification d'un medecin 
$('#btn_annuler_ajout_med').click(function(){
$('#dialog_ajout_modif').dialog('close');

});


//-----------------------------------------------------------------------------------------------------------------------------------------//
//************************************************* Uploader l'image d'un medecin *********************************************************//
$('#uploads').filedrop({
		url: 'upload.php',
		paramname: 'imagefile',
		fallbackid: 'upload_button',
		maxfiles: 5,
		maxfilessize: 2,
		error: function(err,file)
		{
			switch(err)
			{
				case 'BrowserNotSupported':
				$('#filesarea').append('Your browser does not support this uploader');
				break;
				 case 'FileTypeNotAllowed':
				 alert('Vous devez Glisser un fichier de type : jpeg,png,gif');
                break;
			}
		},
		allowedfiletypes: ['image/jpeg','image/png','image/gif'],  
		 beforeSend: function(file, i, done) {
		 	alert('hello world !');
        	
   		 },
		uploadFinished: function(i,file,response)
		{
			//alert(response);
			var nom=response;
			$('#uploads').html('<img src="img/uploaded/'+nom+'" style="width: 100%; height: 100%;" data-nom="'+nom+'"/>');
		}
	});
//------------------------------------------------------------------------------------------------------------------------------------------//
//********************************************Suppression d'un seul medecin medecin ********************************************************//

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
				url: 'medecin.php',
				data: data_id+'&action=supprimer_seul',
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
//--------------------------------------------------------------------------------------------------------------------------------------//
//**********************************************Suppression de plusieurs medecins *****************************************************//
$('#Supprimer').live('click',function()
{
		    var tab_supp=new Array();
		 	$('input[type=checkbox]').each(function()
		 	{
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
		 		$("#dialog_suppr_plusieurs .loader").css('display','none');
		 		$('#nbr_med_suppr').text(tab_supp.length);
		 		$( "#dialog_suppr_plusieurs" ).dialog( "option", "modal", true );
		 		$("#dialog_suppr_plusieurs").dialog("open");
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
								url: 'medecin.php',
								data: { medArray : tab_supp, action :'supprimer_plus'},
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
											ligne.remove();

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
//------------------------------------------------------------------------------------------------------------------------------//
 //******************************************* Selectionner tout :checkbox******************************************************//
 $('#selectionner_tout').click(function()
 {
    var cases=$('td').find('input[type=checkbox]');
    if(this.checked)
    { // si 'selectionner_tout' est coché ,toutes les cases doivent etre cochées
            cases.attr('checked', true);
    }
    else
    { // si si 'selectionner_tout' n'est pas coché ,decocher toutes les cases 
      cases.attr('checked', false);
    }
 });
 //--------------------------------------------------------------------------------------------------------------------//
});//Fin fonction jqueyr