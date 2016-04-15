$(function(){
	$(".sortable").sortable({
		update: function(event, ui) {
			var sortable = $(".sortable");
			var order =  $(".sortable").sortable("serialize");
			console.log(order);
			$.post("tasks.php?action=reorder", order, function(theResponse){
				console.log("right");
			});
        }
	});
})