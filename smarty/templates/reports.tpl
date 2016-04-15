{extends file="reports-desktop.tpl"}{/extend}
{block name=reports}
<ul data-role="listview">
	{if count($reports)>0}
	{foreach $reports as $report}
		<li><a href="reports.php?action=detail&id={$report->id_rapport}">{$report->Delegue->nom} {$report->Delegue->prenom}<span class="right">{$report->date}</span></a></li>
	{/foreach}
	{else}
		<li>La liste des rapports est vide</li>
	{/if}
</ul>
{/block}