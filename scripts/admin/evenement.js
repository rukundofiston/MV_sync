$(function(){
	 //$('#heureD').timepicker({ 'scrollDefaultNow': true });; 

  //dataTable contenant la liste des Demandes
         $("#data_evenement").dataTable({
          "fullPaginate": true,
          "bJQueryUI": true,
          "oLanguage": {
              "sEmptyTable": "No data available in table",
              "sLengthMenu": 'Afficher <select>'+
              '<option value="5">5</option>'+
              '<option value="10">10</option>'+
              '<option value="20">20</option>'+
              '<option value="30">30</option>'+
              '<option value="40">40</option>'+
              '<option value="50">50</option>'+
              '<option value="-1">All</option>'+
              '</select> enregistrement'},                             
          });
//*************************************** Configuration des widgets de Jquery UI **************************************//

$( "#dateD" ).datepicker
	    ({
			changeMonth: true,
			changeYear: true
      	});
$( "#dateF" ).datepicker
	    ({
			changeMonth: true,
			changeYear: true
      	});
$( '#dateD' ).datepicker( "option", "dateFormat","yy-mm-dd");
$( '#dateF' ).datepicker( "option", "dateFormat","yy-mm-dd");


 $("#dialog_ajout_event").dialog({
	minHeight : 400,
	minWidth : 700,
	modal : true,
	autoOpen : false
 });

 //--------------------------------------------------------------------------------------------------------------------//
 $('#ajouter').click(function(){
  	$('#dialog_ajout_event').dialog('open'); 
  }); 

$("#delegue").live('keyup',function()
  {

    var recherche= $(this).val();
    if(recherche == '')
    {}
    else
    {
    $.ajax({
    type: "GET",
    url: "evenement.php",
    data: 'action=complete&mot='+ recherche,
    cache: false,
    success: function(html)
    {
    $("#display").html(html).show();
    }
    });
    }return false;
  });
//Lorsque l'utlisateur clique sur un des element proposés par l'autocomplete
$('.display_box').live('click',function(){
  var nom=$(this).find('strong').text();
  var id=$(this).find('strong').attr('id');
  $('#delegue').val(nom);
  $('#delegue').attr('data_id',id);
  $('#display').hide();
})
$('form').submit(function(){
  //Recuperer les donnéees saisies par l'utilisateur
var dateD=$('#dateD').val();
var dateF=$('#dateF').val();
var heureD=$('#heureD').val();
var titre=$('#titre').val();
var heureF=$('#heureF').val();
var description=$('#description').val();
var lieu=$('#lieu').val();
var delegue=$('#delegue').attr('data_id');
var nom=$('#delegue').val().split(' ')[0];
$('.loader').css('display','inline'); //Afficher le loader 
//Envoi de la requete ajax au serveur
 $.ajax({
    type: "POST",
    url: "evenement.php",
    data: 'action=ajouter&titre='+titre+'&dateD='+dateD+'&dateF='+dateF+'&heureD='+heureD+'&heureF='+heureF+'&description='+description+'&lieu='+lieu+'&delegue='+delegue,
    cache: false,
    success: function(html)
    {
   $('.loader').css('display','none');
  var html="<tr><td>"+description+"</td><td>"+lieu+"</td><td>"+dateD+"</td><td>"+dateF+"</td><td>"+heureD+"</td><td>"+heureF+"</td><td>"+nom+"</td></tr>";
   $('#data_evenement').append(html);
   $('#dialog_ajout_event').dialog('close');

    }
    });

return false;
});


});