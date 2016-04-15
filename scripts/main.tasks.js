/*
 *@author Yassine ELQANDILI
 *@ajax for tasks
 */
$(function(){
	var v = 0;
	var idDemande;
/*	$("#modifynote").live("click",function(){
		if(v==0){
			v=1;
		}else{
			addNote();
		}
	});*/
	$("#delayButton").click(function(){
		$(".loading").css("display", "block");
		$.ajax({
			type : 'POST',
			url : 'tasks.php?action=delay',
			data : 'id='+$("#id_visite").val()+"&date="+$(this+"[name=delayDate]").val(),
			success : function(theResponse){
				var json = jQuery.parseJSON(theResponse);
				if(json.success){
					$("#delayDialog").popup("close");
				}else{
					$(".loading").css("display", "none");
					$("#delayDialog .error h3").html(json.message);
				}
			}
		});
	});
	$("#addNote").live("click",function(){
		addNote();
	});
	$("#deleteYes").live("click", function(){
		$.ajax({
			type: 'get',
			url : 'tasks.php?action=deleteDemande',
			data : "id="+idDemande,
			success : function(theResponse){
				var json = jQuery.parseJSON(theResponse);
				if(json.success){
					if(json.type=="noError"){
						$("#collapsible_"+idDemande).remove();
						$(".demandesCollapse").collapsibleset("refresh");
						$("#confirmDialog").popup("close");
					}else{
						$("#confirmDialog [data-role=header]").html('<div data-role="header">'+
										'<h4>'+json.title+'</h4>'+
										'</div>');
						$("#confirmDialog .ui-content").html(json.message);
						 setTimeout( function(){
						 	$("#confirmDialog").popup("close");
						 },1000 );
					}
					/*$("#response[data-role=content] h1").html(json.title);
					$("#response[data-role=header] h1").html(json.type);
					$("#response[data-role=content] p").html(json.message);
					//$.mobile.changePage("#response", "slide");*/
				}
			}
		})
	});
	$("#cancelYes").click(function(){
		$.ajax({
			type: 'get',
			url : 'tasks.php?action=cancel',
			data : "id="+$("#id_visite").val(),
			success : function(theResponse){
				var json = jQuery.parseJSON(theResponse);
				if(json.success){
					alert("Votre tache à été annullée");
					/*$("#response[data-role=content] h1").html(json.title);
					$("#response[data-role=header] h1").html(json.type);
					$("#response[data-role=content] p").html(json.message);
					//$.mobile.changePage("#response", "slide");*/
				}else{
					alert("nope babe :D "+ json.message);
				}
			}
		})
	});
	$("#cancelNo").live('click', function() {
		$("#cancelDialog").popup("close");
	})
	$("#delayNo").live('click', function(){
		$("#delayDialog").popup("close");
	});
	$("#deleteNo").click(function(){
		$("#confirmDialog").popup("close");
	});
	$(".deleteButton").live("click", function(){
		idDemande = $(this).attr("id");
	});
	$("#addDemande").click(function(){
		addDemande();
	});
	function addNote(){
		var type = $("#addNote");
		if(type.attr("type")=="confirm"){
			if(verify($("#note-area"))){
			var id =$("#id_visite").val();
			var note = $("#note-area").val();
			var order = "note="+note;
			alert(order);
			$.post("tasks.php?action=addnote&id="+id, order, function(theResponse){
				if(theResponse==0){
					console.log("here");
					show();
					v=0;
					type.attr("type", "modify");
				}
			});
			}
		}else if(type.attr("type")=="modify"){
			var note = $(".note-div2 p").html();
			$(".note-div2").html('<textarea name="note" id="note-area" placeholder="Ajouter une note pour cette visite"></textarea>').trigger("create");
			$("#note-area").show();
			$("#note-area").val(note);
			type.attr("type", "confirm");
		}
	}
	function addDemande(){
		if(verify($("#descDemande"))  && verify($("#selectDemande"))){
			var id =$("#id_visite").val();
			var order = $("#formDemande").serialize();
			$.post("tasks.php?action=addDemande&id="+id, order, function(theResponse){
				var json = jQuery.parseJSON(theResponse);
				if(json.response==0){
					var objet = $("#objet").val();
					var desc = $("#descDemande").val();
					var newDiv = '<div data-role="collapsible" data-theme="d" id="collapsible_'+json.id+'">'+
									'<h3>'+objet+'</h3>'+
									'<p>'+desc+'</p>'+
									'<a data-icon="delete" data-rel="popup" data-transition="pop" href="#confirmDialog" data-role="button" id="'+json.id+'" class="deleteButton">Delete</a>'
								  '</div>';
					$("#objet").val("");
					$("#descDemande").val("");
					$(".demandesCollapse").append(newDiv).trigger("create");
					$(".demandesCollapse").find('div[data-role=collapsible]').collapsible({refresh:true});
					$(".demandesCollapse").collapsibleset("refresh");
				}else{
					console.log("wroooong");
				}
			});
		}else{
			alert("Veuillez remplir tous les champs");
		}
	}
	function verify(champ){
		if(champ.val()==""){
			return false;
		}else{
			return true;
		}
	}
	function show(){
		var val = $("#note-area").val();
		$(".note-div2").html("<p>"+val+"</p>")
		$(".note-div2").fadeIn();
		$(".button").html('<a data-role="button" type="modify" id="addNote">Modifier</a>').trigger("create");
		$("#note-area").hide();
	}
});