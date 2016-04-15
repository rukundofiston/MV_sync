{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
<script type="text/javascript" src="../scripts/main.reorder.js"></script>
	{assign var='backUrl' value='index.php'}
	{assign var='headerName' value='Vos visites'}
	{assign var='home' value=false}
	{include file="header.tpl"}
	<div data-role="content">
		{if count($tasks)==0}
			<h4 data-theme="b">Aucune visites n'est trouvée</h4>
		{else}
			{if $allVisites==true}
				<div data-role="collapsible" data-collapsed="true" data-theme="e">
					<h3>Prochaine visites</h3>
			{/if}
				<ul data-role="listview" data-filter="true" class="{$sortable}" data-theme="a" data-filter-theme="a">
					{foreach $tasks as $task}
					<li id="id_{$task->id_visite}">
						<a href="tasks.php?action=detail&id={$task->id_visite}">
						<h4>{$task->Medecin->nom} {$task->Medecin->prenom}</h4>
						<p class="ui-li-aside">{$task->date}</p>
						</a>
					</li>
					{/foreach}
				</ul>
			{if $allVisites==true}
				</div>
			{/if}
		{/if}
		{if $allVisites==true and count($oldTasks)>0}
		<div data-role="collapsible" data-theme="e">
			<h3>Visite anciennes</h3>
			<ul data-role="listview" data-filter="true" class="{$sortable}" data-theme="a" data-filter-theme="a">
				{foreach $oldTasks as $oldTask}
					<li id="id_{$oldTask->id_visite}">
						<a href="tasks.php?action=detail&id={$oldTask->id_visite}">
						<h4>{$oldTask->Medecin->nom} {$oldTask->Medecin->prenom}</h4>
						<p class="ui-li-aside">{$oldTask->date}</p>
						</a>
					</li>
				{/foreach}
			</ul>
		</div>
		{/if}
	</div>
	<div data-role="footer" data-position="fixed">
		<div data-role="navbar">
			<ul>
				<li>
					<a href="tasks.php?action=addForm" data-icon="plus" data-iconpos="bottom" data-role="button">Ajouter</a>
				</li>
				<li>
					<a href="tasks.php?action=view" data-icon="plus" data-iconpos="bottom" data-role="button">Mon programme </a>
				</li>
				<li>
					<a href="tasks.php?action=viewDone" data-icon="plus" data-iconpos="bottom" data-role="button">Visites effecut&eacute;e</a>
				</li>
				<li>
					<a href="tasks.php?action=viewAll" data-icon="grid">Liste des visites</a>
				</li>
				<li>
					<a href="tasks.php?action=viewCanceled" data-theme="b" data-icon="delete" data-iconpos="bottom" data-role="button">Visites annul&eacute;es</a>
				</li>
			</ul>
		</div>
	</div>
</div>
{/block}