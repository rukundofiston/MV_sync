{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page" data-theme="b">
	<div data-role="header" data-theme="b">
		<h1>Erreur</h1>
	</div>
	<div data-role="content" data-theme="b">
		<div>
			<h3>{$title}</h3>
			<p>{$message}</p>
		</div>
	</div>
	<div data-role="footer" data-position="fixed" data-theme="b">
		<h3>Copyright</h3>
	</div>
</div>
{/block}