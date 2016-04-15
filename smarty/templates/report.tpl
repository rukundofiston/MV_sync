{extends file="reports-desktop.tpl"}{/extend}
{block name=content}
<div data-role="page">
	{assign var='backUrl' value='reports.php'}
	{assign var='headerName' value=$report->Delegue->prenom|cat: ' '|cat: $report->Delegue->nom}
	{assign var='home' value=true}
	{include file="header.tpl"}
	<div data-role="content">
		<h3>Rapport pour la date de : {$report->date}</h3>
		<p> {$report->introduction} </p>
		{include file='report-items.tpl'}
		<p> {$report->conclusion} </p>
	</div>
	<div data-role="footer" data-position="fixed">
		<h3>Copyright</h3>
	</div>
</div>
{/block}