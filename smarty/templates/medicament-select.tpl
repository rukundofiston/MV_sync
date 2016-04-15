{extends file="skeleton.tpl"}{/extend}
{block name=content}
<div data-role="page" id="doctors-select">
	<script type="text/javascript">
		$(function(){
			$("#addMedicament").live("click",function(){
				id = $("#id_visite").val();
				$.ajax({
					type :"post",
					url : "tasks.php?action=addMedicament&id="+id,
					data : $(".checkbox").serialize(),
					success : function(theResponse){
						if(theResponse==0){
							window.location = "tasks.php?action=detail&id="+id;
						}
					}
				});
			});
		});
	</script>
	<div data-role="header">
		<h1>MVsync</h1>
	</div>
	<div data-role="content">
		<form action="" method="post">
			<div data-role="fieldcontain">
				<ul data-role="listview" data-filter="true">
				{foreach $drugs as $drug}
					<li>
						<input type="checkbox" name="drugs[]" value="{$drug->id_medicament}" id="checkbox_{$drug->id_medicament}" class="checkbox" />
						<label for="checkbox_{$drug->id_medicament}">{$drug->libelle}</label>
					</li>
				{/foreach}
				</ul>
			</div>
			<div data-role="fieldcontain">
				<input type="button" id="addMedicament" value="Ajouter">
			</div>
		</form>
	</div>
	<div data-role="footer" data-theme="a">
		<h3>Copyright</h3>
	</div>
</div>
{/block}