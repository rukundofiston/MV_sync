<div data-role="page" id="doctors-select">
	<div data-role="header">
		<h1>MVsync</h1>
	</div>
	<div data-role="content">
		<form action="tasks.php?action=step1" data-ajax="false" method="post">
			<div data-role="fieldcontain">
				<ul data-role="listview" data-filter="true" data-filter-placeholder="Ville Nom Prenom">
				{foreach $doctors as $doctor}
					<li data-filtertext="{$doctor->Secteur->libelle} {$doctor->nom} {$doctor->prenom}">
						<input type="checkbox" name="doctors[]" value="{$doctor->id_medecin}" id="checkbox_{$doctor->id_medecin}" class="custom" />
						<label for="checkbox_{$doctor->id_medecin}">{$doctor->nom} {$doctor->prenom}</label>
					</li>
				{/foreach}
				</ul>
			</div>
			<input type="submit" value="Etape 2">
		</form>
	</div>
	<div data-role="footer" data-theme="a">
		<h3>Copyright</h3>
	</div>
</div>