{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	{block name=script}
	<script type="text/javascript" src="../scripts/main.tasks.js"></script>
		{literal}
		<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUi4q1aK4mLnb5yo1LUKOHIqEGylj0BMk&sensor=true"></script>-->
		{/literal}
	{/block}	
	<div data-role="header">
		<h1>Detail de la visite</h1>
	</div>
	<div data-role="content"></div>
	<div data-role="footer"></div>
</div>