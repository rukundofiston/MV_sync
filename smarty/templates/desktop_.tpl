{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page" id="desktop">
	<div data-role="header" class="header">
		<a href="logout.php" data-icon="delete" class="ui-btn-right">Deconnexion</a>
		<h1>Bonjour {$smarty.session.user_name}</h1>
	</div>
	<div data-role="content">
    <div id="logo"></div>
		<ul id="list-grid">
			<li><a href="tasks.php"><div class="tasks">Visites</div></a></li>
			<li><a href="reports.php"><div class="reports">Rapports</div></a></li>
			{if $smarty.session.rights|strpos:"stats"!==false}
			<li><a href="charts.php"><div class="stats">Statistiques</div></a></li>
			{/if}
			<li><a href="drugs.php"><div class="pills">Médicaments</div></a></li>
			<li><a href="events.php"><div class="evnm">Événement</div></a></li>
			<li><a href="doctors.php?action=view"><div class="doctors">Medecins</div></a></li>
			{if $smarty.session.rights|strpos:"delegue"!==false}
			<li><a href="doctors.php?action=view"><div class="noti">Notification</div></a></li>
			{/if}
		</ul>
	</div>
	<div data-role="footer" data-position="fixed">
		<h1>Création de Dream !t Sollutions</h1>
	</div>
</div>
{/block}