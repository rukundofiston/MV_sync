{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page">
	<script type="text/javascript">
		$(function(){
			function Ajax(addresse){
				$.ajax({
				url : addresse,
				success : function(theResponse){
						var str = theResponse.split("|");
						if(str[0]==0){
							var html = str[1];
							$(html).hide().prependTo("ul").fadeIn(500);
							$('ul').listview("refresh");
							//$('ul').prepend(html);
						}else{
							$("body").html(str[1]);
						}
					}
				});
			}
			//Ajax('notifications-li.php?action=all');
			setInterval(function(){
				Ajax('notifications-li.php');
			},5*1000);
		});
	</script>
	{assign var='backUrl' value='index.php'}
    {assign var='headerName' value='Notifications'}
    {assign var='home' value=false}
    {include file="header.tpl"}
	<div data-role="content" data-theme="e">
		<ul class="" data-role="listview" data-divider-theme="c" data-theme="d">
			{include file="notifications-li.tpl"}
		</ul>
	</div>
	<div data-role="footer">
		<h1>Copyright</h1>
	</div>
</div>
{/block}