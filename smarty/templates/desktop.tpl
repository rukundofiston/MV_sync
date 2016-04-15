{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page" class="desktop">
	<div data-role="header" id="desktop-header">
		<h1>{$smarty.session.user_name}</h1>
	</div>
	<div data-role="content" class="desktop">
		<center><div id="logo"></div></center>
		<div class="desktop-icon"><a href="tasks.php"><div class="tasks"></div><span>Tâches</span></a></div>
		<div class="desktop-icon"><a href="drugs.php"><div class="pills"></div><span>Medicaments</span></a></div>
		<div class="desktop-icon"><a href="doctors.php?action=view"><div class="doctors"></div><span>Medecins</span></a></div>
		{if $smarty.session.rights|strpos:"stats"!==false}
		<div class="desktop-icon"><a href="reports.php?action=view"><div class="stats"></div><span>Stats</span></a></div>
		{/if}
		{if $smarty.session.rights|strpos:"delegue"!==false}
		<div class="desktop-icon"><a href="reports.php?action=view"><div class="stats"></div><span>Delegués</span></a></div>
		{/if}
		{if $smarty.session.rights|strpos:"rapports"!==false}
		<div class="desktop-icon"><a href="reports.php?action=generate"><div class="reports"></div><span>Rapports</span></a></div>
		{/if}
		<div class="desktop-icon"><a href="reports.php?action=generate"><div class="events"></div><span>Evenemnt</span></a></div>
	</div>
	<div data-role="footer" data-theme="a">
		<h3>Copyright</h3>
	</div>
</div>
{/block}