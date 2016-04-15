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
					$("#dateNaissance").attr("value",json.dateNaissance);
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