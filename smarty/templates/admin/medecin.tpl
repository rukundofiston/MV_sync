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
					{foreach from=$tab item=medecin}
						<tr id="tr_{$medecin->id_medecin}">
							<td><input type="checkbox" name="choix" value="{$medecin->id_medecin}"/></td>
							<td class="nom">{$medecin->nom}</td>
						    <td class="prenom">{$medecin->prenom}</td>
							<td class="adresse">{$medecin->adresse}</td>
							<td class="fax">{$medecin->fax}</td>
							<td class="tel">{$medecin->tel}</td>
							<td class="email">{$medecin->email}</td>
							{if count($medecin->Type)>0}
							<td class="type" data-type="{$medecin->Type->id_type}">{$medecin->Type->libelle}</td>
							{else}
							<td></td>
							{/if}
							<td class="sexe">{$medecin->sexe}</td>
							<td class="civilite">{$medecin->civilite}</td>
							<td><img src="supprimer.png" id="{$medecin->id_medecin}" class="lien_supp"/></td>
							<td><img data-id="{$medecin->id_medecin}" data-photo="{$medecin->photo}"class="lien_modif" src="modifier.png"/></td>
						</tr>
					{/foreach}	

				</tbody>
			</table>
		</div>
	</div>
	<!--Boite de dialogue qui sera utilisée pour l'ajout et la modification du profil d'un medecin -->
	<div id="dialog_ajout_modif" class="dialogue" title="Ajouter un médecin">
		<form method="POST" id="add_form" action="" enctype="multipart/form-data" data-type="add" data-id="">
				{literal}
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
				{/literal}
	             <div class="form-row control-group row-fluid">
	                <label class="control-label span3" for="default-select">Specialité</label>
	                <div class="controls span7">
	                  <select name="type" id="type">
	                  		{foreach from=$tab_type item=type}
	                  		<option value="{$type->id_type}">{$type->libelle}</option>
	                  		{/foreach}
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
{/block}