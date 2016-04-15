<ul data-role="listview" data-inset="true" data-theme="a" data-divider-theme="d">
	<li data-role="list-divider" >La liste des m&eacute;decin visit&eacute; pendant la journ&eacute;e du : {$date}</li>
	{foreach $visites as $visite}
	<li>
		Dr. {$visite->Medecin->nom} {$visite->Medecin->prenom}
		<p class="ui-li-aside">{$visite->date}</p>
		{foreach $visite->Demande as $demande}
			<li><p>- {$demande->description}</p></li>	
		{/foreach}
		<input name="ids[]" value="{$visite->id_visite}" type="hidden">
	</li>
	{/foreach}
</ul>