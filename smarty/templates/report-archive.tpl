{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	<div data-role="header" data-theme="a">
		<h1>{$report->Delegue->nom} {$report->Delegue->prenom}</h1>
	</div>
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