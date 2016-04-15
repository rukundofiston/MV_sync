 $(document).ready(function(){
        //dataTable contenant la liste des Demandes
         $("#data_demande").dataTable({
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
  //Configuration des widgets :dialog de Jquery UI

  $("#dialog_modification_etat").dialog({
      minHeight : 200,
      minWidth : 500,
      modal : true,
      autoOpen : false
  });
  $("#dialog_voir_demande").dialog({
      minHeight : 150,
      minWidth : 500,
      modal : true,
      autoOpen : false
  });
  //********************************************* Changer l'etat du demande *****************************************************//
  //Lors du click sur 'Modifier' 
  $('.etat').click(function(){
      var id=$(this).attr('id');
      $('#demande_id').val(id);  
      var etat=$(this).text(); 
      if(etat== "En cours"){ //tester si l'etat de la demande est "En cours" Pour pouvoir continuer le processus 
        $('.loader').css('display','none');
        $('#dialog_modification_etat').dialog('open'); // du changement de l'etat de la demande 
      }  
  });

 $('#btn_modification_etat').click(function(){
    var etat=$('#etat option:selected').attr('value'); //Recupérer l'identifiant de l'etat choisie par l'utilisateur
    var id=$('#demande_id').val();                     //recupérer l'identifiant de la demande en cours de changement d'etat
      if($('#'+id).text() != $('#etat option:selected').text()) //si l'utilisateur a choisi un etat different de l'etat actuel de la demande 
      {
      $('.loader').css('display','inline');    //afficher le loader 
      //Envoi des données recupérées au serveur avec une requete ajax 
      $.ajax(
       {

        type: 'POST', 
        url: 'demande.php',
        data: 'action=modifier&id='+id+'&etat='+etat,
        async: false,
        cache: false,
        success: function()
          {
           var val = $("#etat option:selected").text();
           var Class;
           if(val == "En cours"){
            Class="en_cours"
           }else if(val == "Acceptée"){
            Class = "accept"
           }else if (val == "Refusée"){
            Class = "refus"
           }
           $('#'+id).html('<div class="status '+Class+'">'+ val +'</div>');
            $('.loader').css('display','none');  
           $('#dialog_modification_etat').dialog('close'); //Fermeture de la boite de dialgue
          }
       
      });// fin de $.ajax()
    }//fin de if 
    else{
      $('#dialog_modification_etat').dialog('close');
    }
 });
  $('#btn_annuler_modification_etat').click(function(){  //Fermer la boite de dialogue lorsque l'utilisateur clique sur le btn annuler 
      $('#dialog_modification_etat').dialog('close');
  });
  //-------------------------------------------------------------------------------------------------------------------------------//

  //********************************************* Visualiser une demande **********************************************************//

  //Lorsque l'utilisateur clique sur "voir",l'application envoie une requete ajax au serveur pour recupérer l'ojet et la 
  //description de la demande en question

    $('.voir').click(function(){
      var lign=$(this).parent(); //recuperer via jquery la lign sur laquelle l'utilisateur a cliqué
      var id=lign.find('td:last').attr('id');  // recuperer l'id de la demande qui stocké dans l 'attribu id de la derniere cellule
      $('.load').css('display','inline');
       //Envoyer les données recupérés au serveur avec une requete ajax
       $.ajax(
       {
        type: 'POST', 
        url: 'demande.php',
        data: 'action=visualiser&id='+id,
        async: false,
        cache: false,
        success: function(reponse)
          { 
            $('.load').css('display','none'); //cacher le loader 
            $('#dialog_voir_demande').append(reponse); //afficher le contenu renvoyé par le serveur dans la boite de dialogue 
            $('#dialog_voir_demande').dialog('open');   //ouvrir la boite de dialogue
          }
     });// fin de $.ajax()
  });
//Creer un evenement relatif a l'ouverture de la boite de dialogue contenant les details d'une commande 
 $( "#dialog_voir_demande" ).on( "dialogopen", function( event, ui ) {
      var id=$('#dem_id').val(); //recuper l'id de la demande qui est stocké dans un input de type "hidden"
      var etat=$('#'+id).text();  //puis recuperer le libelle de l'etat de la demande 
      if(etat == 'Non vue')
      {
        //si l'etat de la demande est "Non vue" L'application envoie une requete ajax au serveur pour changer l'etat de la demande => "En cours"
        $.ajax(
         {
          type: 'POST', 
          url: 'demande.php',
          data: 'action=modifier&etat=0&id='+id,
          async: false,
          cache: false,
          success: function()
            { 
                $('#'+id).text('En cours');
                $("#dialog_voir_demande" ).dialog('open');

            }
        });// fin de $.ajax()    
      }//fin if
 });
 $('#btn_fermer_voir_demande').live('click',function(){
  $('#dialog_voir_demande').dialog('close');
 })
 $("#dialog_voir_demande").on( "dialogclose", function( event, ui ) {
    $(this).html('');
 } );
});
 //---------------------------------------------------------------------------------------------------------------------------------------//