<div data-role="header">
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-left">
		<a data-role="button" href="{$backUrl}" data-icon="back" data-iconpos="notext">Précedent</a>
		{if $home==true}
		<a data-role="button" href="index.php" data-icon="home" data-iconpos="notext">Accueil</a>
		{/if}
	</div>
	<div data-role="controlgroup" data-type="horizontal" class="ui-btn-right">
	<a data-role="button" href="logout.php" data-icon="delete" data-iconpos="right">Déconnexion</a>
	</div>
	<h1>{$headerName}</h1>
</div>