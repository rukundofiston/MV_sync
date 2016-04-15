{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	<div data-role="header">
		<h1>MVsync</h1>
	</div>
	<div data-role="content">
		<div class="task-header">
			<div class="left"><img class="profil-pic" src="../images/profils/photo.png"></div>
			<div class="task-description">
				<p>Nom : Dr. {$doctor->nom} {$doctor->prenom}</p>
				<p>Sp&eacute;cialit&eacute; : Cardiologue</p>
			</div>
		</div>
		<div class="right"><a href="#">Historique</a></div>
		<br>
		<div data-role="collapsible">
			<h3>Trajet</h3>
				<script type="text/javascript">
					var v = 0;
					var marker;
					function initialize(){
						if(v==0){
							v =1;
							var image = '../images/mark.png';
							var myLatlng = new google.maps.LatLng({$doctor->lat}, {$doctor->lng});
							var otherLatlng = new google.maps.LatLng(31.635699,-8.005626);
							var mapOptions = {
								center: myLatlng,
								zoom: 10,
								mapTypeId: google.maps.MapTypeId.ROADMAP 
							};
							var map = new google.maps.Map(document.getElementById("map_canvas"),
							mapOptions);

							var directionsRenderer = new google.maps.DirectionsRenderer();
							directionsRenderer.setMap(map);
							//directionsRenderer.setPanel(document.getElementById('directionsPanel'));

							var directionsService = new google.maps.DirectionsService();
							var request = {
							origin: myLatlng,
							destination: otherLatlng,
							travelMode: google.maps.DirectionsTravelMode.DRIVING
							};
							directionsService.route(request, function(response, status) {
								if (status == google.maps.DirectionsStatus.OK) {
									directionsRenderer.setDirections(response);
								}else {
									alert('Error: ' + status);
								}
							});
							/*var marker = new google.maps.Marker({
								position: myLatlng,
								map: map,
								icon : image,
								animation: google.maps.Animation.DROP,
							});*/
						}
					}
				</script>
				<div id="map_canvas" onclick="initialize()" style="width:100%; height:400px; background:#000;">
				</div>
		</div>
		<div data-role="collapsible">
			<h3>Medicaments</h3>
			<ul data-role="listview" data-inset="true">
				{foreach $drugs as $drug}
					<li><a href="#">{$drug->Medicament->libelle}</a></li>
				{/foreach}
			</ul>
			<p><a href="#">Ajouter Medicament</a></p>
		</div>
		<div data-role="collapsible">
			<h3>Notes</h3>
				<textarea name="note" placeholder="Ajouter une note pour cette visite"></textarea>
				<button class="medium-button">Ajouter</button>
		</div>
		<div data-role="collapsible">
			<h3>Demandes</h3>
			<div data-role="fieldcontain">
				<select name="type">
					<option value="">Selectionner un type</option>
					<option value="">Remarque</option>
					<option value="">Demande</option>
					<option value="">Demande</option>
				</select>
			</div>
				<textarea name="description" placeholder="Description"></textarea>
				<button class="medium-button">Ajouter</button>
		</div>
	</div>
	<div data-role="footer" >
		<div data-role="navbar" data-theme="c">
			<ul>
				<li><a href="">Terminer</a></li>
				<li><a href="">Repporter</a></li>
				<li><a href="">Annuler</a></li>
			</ul>
		</div>
	</div>
</div>
{/block}