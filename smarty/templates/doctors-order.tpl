{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	<script type="text/javascript" src="../scripts/main.reorder.js"></script>
	<div data-role="header">
		<h1>Etape 2</h1>
	</div>
	<div data-role="content">
		<form action="tasks.php?action=finish" method="post">
			<ul data-role="listview" data-filter="true" class="sortable">
				{foreach $visites as $visite}
				<li id="id_{$visite->id_visite}" >
					<img src="../images/profils/photo.png"/>
					<h4>{$visite->Medecin->prenom} {$visite->Medecin->nom}</h4>
				</li>
				{/foreach}
			</ul>
			<a href="tasks.php" rel="external" data-icon="check" data-role="button">Terminer</a>
		</form>
	</div>
	<div data-role="footer">
		<h3>Copyright</h3>
	</div>
</div>
{/block}