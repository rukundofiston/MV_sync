{extends file="sup_admin/skeleton.tpl"}{/extends}
{block name="content"}
	<div class="box gradient">
		<div class="title">
			<h2>Listes des comptes utilisateurs</h2>
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
						<th>Login</th>
						<th>Droit</th>
						<th>Types</th>
						<th>Etat</th>
						<th>Actions</th>
					</tr>
				</thead>
				
				<tbody>
					{foreach $comptes as $Compte}
					<tr class="ligne" id="{$Compte->id_compte}">
						<td>{$Compte->login}</td>
						<td>{$Compte->droit}</td>
						<td>{$Compte->type}</td>
						<td>{$Compte->etat}</td>
						<td><div id="{$Compte->id_compte}" class="modify"></div>
							<a href="index.php?action=delete&id={$Compte->id_compte}">
								<div class="delete"></div>
							</a>
						</td>
					</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
	</div>
	<div id="dialog" title="Ajouter un Compte">
		{include file='sup_admin/ajout.tpl'}
	</div>
	{literal}
	<script type="text/javascript">
	$(document).ready(function() {
		$("#dialog").dialog({
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
		$('.ligne').click(function(){
				})
	});
</script>
{/literal}
{/block}