{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	<div data-role="header">
		<h1>Medicament</h1>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-filter="true">
			{foreach $medicaments as $medicament}
			<li><a href="drugs.php?action=detail&id={$medicament->id_medicament}">
					<h4>{$medicament->libelle}</h4>
				</a>
			</li>
			{/foreach}
		</ul>
	</div>
	<div data-role="footer" data-position="fixed">
		<h3>Copyright</h3>
	</div>
</div>
{/block}