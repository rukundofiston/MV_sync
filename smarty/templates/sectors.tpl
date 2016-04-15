<option value="">Selectionner votre choix</option>
{foreach $sectors as $sector name=sector}
	{if $smarty.foreach.sector.first} 
	<option value="{$sector->id_secteur}" selected="selected">{$sector->libelle}</option>
	{else}
	<option value="{$sector->id_secteur}">{$sector->libelle}</option>
	{/if}
{/foreach}