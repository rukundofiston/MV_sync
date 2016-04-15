{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page" data-theme="d">
	{block name=script}
	<script type="text/javascript" src="../scripts/jquery.flot.js"></script>
		{literal}
		<script type="text/javascript">

			$(function () {
		$("#submit").click(function(){
			alert($('#chart_form').serialize())
			$.ajax({
				type : 'post',
				url : 'charts.php?action=getData',
				dataType : 'json',
				data : $('#chart_form').serialize(),
				success : function(theResponse){
					console.log(theResponse)
					//if(theResponse.length==0){
						//$("#placeholder").html("<p class='error'> Il n'existe pas de ventes pour ces critères</p>");
					//}else{
						d7 =[];
						for (var i = 0; i < theResponse.length; i++){
							d7.push([(new Date(theResponse[i][0])).getTime(), theResponse[i][1]]);
						}
						$.plot($("#placeholder"), [d7], {
							lines: {show: true},
							legend: {
								show: true,
								margin: 10,
								backgroundOpacity: 0.5,
							},
							points: {
								show: true,
								radius: 3
							}, 
							xaxis: {
								mode: "time",
								minTickSize: [1, "day"],
								timeformat: "%y/%m/%d"
							}
						});
					//}// fin de la condition if/else
				}// fin de la fontion success
			})// fin de la fonction ajax ;)
		});// fin du submit du boutton 

		$("#secteurs").change(function(){
			id = $("#secteurs option:selected").val()
			if(id!="null"){
				$.ajax({
					type: 'post',
					url : 'charts.php?action=getSubSectors&id_secteur='+id,
					data : 'request=ajax',
					success : function(theResponse){
						$('#subSecteur').html(theResponse);
						$('#subSecteur').selectmenu('refresh', true);
						console.log($('#selectBox option:nth-child(1)').attr('selected', 'selected'));
					}
				});
			}
		});
	});//fin de script :D

		</script>
		{/literal}
			<div data-role="header">
				<div data-role="controlgroup" data-type="horizontal" class="ui-btn-left">
					<a data-role="button" href="index.php" data-icon="back" data-iconpos="notext">Précedent</a>
					<a data-role="button" href="index.php" data-icon="home" data-iconpos="notext">Accueil</a>
	        	</div>
				<div data-role="controlgroup" data-type="horizontal" class="ui-btn-right">
				<a data-role="button" href="logout.php" data-icon="delete" data-iconpos="right">Déconnexion</a>
				</div>
				<h1>Statistiques</h1>
			</div>
		<div data-role="content">
			<form id="chart_form">
				<select id="drugs" name="id_medicament">
					{foreach $drugs as $drug}
						<option value="{$drug->id_medicament}">{$drug->libelle}</option>
					{/foreach}
				</select>
				<select id="secteurs" name="id_secteur">
					<option value="null">Faites Votres choix</option>
					{foreach $sectors as $sector}
						<option value="{$sector->id_secteur}">{$sector->libelle}</option>
					{/foreach}
				</select>
				<select id="subSecteur" name="id_subSecteur">
				</select>
				<input type="date" name="date_debut" placeholder="Entrer la date de début">
				<input type="date" name="date_fin" placeholder="Entrer la date de fin">
			</form>
			<button id="submit">Afficher</button>
			<div id="placeholder" style="height : 200px; width:100%;"></div>
		</div>
		<div data-role="footer">
			<h1>Copyright</h1>
		</div>
	{/block}
{/block}