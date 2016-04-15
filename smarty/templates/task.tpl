{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	{block name=script}
	<script type="text/javascript" src="../scripts/main.tasks.js"></script>
		{literal}
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUi4q1aK4mLnb5yo1LUKOHIqEGylj0BMk&sensor=true"></script>
		{/literal}
	{/block}	
	{assign var='backUrl' value='tasks.php'}
	{assign var='headerName' value='Visite'}
	{assign var='home' value=true}
	{include file="header.tpl"}
	<div data-role="content" data-theme="a" style="height : 100%, padding-bottom: 100%">
		<div class="task-header">
			<div class="left"><img class="profil-pic" src="../images/profils/{$doctor->photo}"></div>
			<div class="task-description">
				<p>Nom : Dr. {$doctor->nom} {$doctor->prenom}</p>
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
							var otherLatlng = new google.maps.LatLng({$doctor->lat}, {$doctor->lng});
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
				{if count($drugs)>0}
				{foreach $drugs as $drug}
					<div data-role="collapsible" >
						<h3>{$drug->Medicament->libelle}</h3>
						<p>{$drug->Medicament->desctiption}</p>
					</div>
				{/foreach}
				{else}
					<p class="parag">vous n'avez pas choisi des m&eacute;dicaments</p>
				{/if}
			</div>		
			{if $visite->etat==-1}
			<p><a href="tasks.php?action=drugs-select" data-rel="dialog">Ajouter Medicament</a></p>
			{/if}
		</div>
		<div data-role="collapsible" id="note-div">
			<h3>Notes</h3>
				{if $visite->note==""}
					<div class="note-div2"><textarea name="note" id="note-area" placeholder="Ajouter une note pour cette visite"></textarea></div>
					<div class="button"><a id="addNote" type="confirm" data-role="button" class="medium-button">Ajouter</a></div>
				{else}
					<div class="note-div2"><p>{$visite->note}</p></div>
					<a id="addNote" type="modify" data-role="button">modifier</a>
				{/if}
				<input type="hidden" value="{$visite->id_visite}" id="id_visite">
		</div>
		<div data-role="collapsible">
			<h3>Demandes</h3>
			<div data-role="collapsible-set" class="demandesCollapse">
				{foreach $demandes as $demande}
					{if $demande->etat==-1 }{assign var=theme value="a"}
					{else if $demande->etat==0 } {assign var=theme value="d"}
					{else if $demande->etat==1 } {assign var=theme value="c"}
					{else if $demande->etat==2 } {assign var=theme value="b"}
					{/if}
					<div data-role="collapsible" data-theme="{$theme}" id="collapsible_{$demande->id_demande}">
						<h3>{$demande->objet}</h3>
						<p>{$demande->description}</p>
						<a data-icon="delete" data-rel="popup" data-transition="pop" href="#confirmDialog" data-role="button" id="{$demande->id_demande}" class="deleteButton">Supprimer</a>
					</div>
				{/foreach}
			</div>
			<form id="formDemande">
			<div data-role="fieldcontain">
				<input type="text" name="type" id="objet">
			</div>
				<textarea name="description" id="descDemande" placeholder="Description"></textarea>
			</form>
			<a id="addDemande" data-role="button" class="medium-button">Ajouter</a>
		</div>
		{if $visite->etat!=0}		
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
		{/if}
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
	{if $visite->etat==-1}
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li><a href="tasks.php?action=finish&id={$visite->id_visite}">Terminer</a></li>
				<li><a href="#delayDialog" data-rel="popup" data-transition="pop" data-role="button">Repporter</a></li>
				<li><a href="#cancelDialog" data-rel="popup" data-transition="pop" data-role="button">Annuler</a></li>
			</ul>
		</div>
	</div>
	{else if $visite->etat==0}
	<div data-role="footer" data-position="fixed" data-theme="e">
		<h2>Cette visite est termin&eacute;e</h2>
	</div>
	{else if $visite->etat==-2}
	<div data-role="footer" data-position="fixed" data-theme="b">
		<h2>Cette visite est annul&eacute;e</h2>
	</div>
	{/if}
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
{/block}