{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	<div data-role="header">
		<a href="doctors.php?action=addForm" data-icon="plus" class="ui-btn-right" data-theme="a">Ajouter</a>
		<h1>MVsync</h1>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-filter="true">
			{foreach $doctors as $doctor}
			<li><a href="doctors.php?action=detail&id={$doctor->id_medecin}">
					<img src="../images/profils/{$doctor->photo}"/>
					<h4>{$doctor->nom} {$doctor->prenom}</h4>
					<p>{$doctor->fax}</p>
				</a>
			</li>
			{/foreach}
		</ul>
	</div>
	<div data-role="footer">
		<h3>Copyright</h3>
	</div>
</div>
{/block}