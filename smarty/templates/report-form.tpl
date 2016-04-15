{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	{assign var='backUrl' value='rapports.php'}
	{assign var='headerName' value='Créer votre rapport'}
	{assign var='home' value=true}
	{include file="header.tpl"}
	<div data-role="content">
		<form action="reports.php?action=generate" method="post">
			<input type="date" name="date" value="{$date}">
			<input type="submit" data-theme="d" value="G&eacute;n&eacute;rer">
		</form>
		{if count($visites)!=0}
		<form action="reports.php?action=add" method="post">
		<label>Introduction : </label>
		<div data-role="fieldcontain">
			<textarea name="introduction"></textarea>
		</div>
		<label>Conclusion : </label>
		<div data-role="fieldcontain">
			<textarea name="conclusion"></textarea>
		</div>
		{include file='report-items.tpl'}
		<input type="hidden" name="date" value="{$date}">
		<input type="submit" data-theme="d" value="Cr&eacute;er">
		</form>
		{else}
		<ul data-role="listview" data-inset="true" data-divider-theme="b">
			<li data-role="list-divider" >Il n'y a pas de visite pour le jours en question</li>
		</ul>
		{/if}
	</div>
	<div data-role="footer">
		<h3>Copyright</h3>
	</div>
</div>
{/block}