 // Datatables
    $(document).ready(function(){

        //dataTable contenant la liste des medicaments
         $("#data_medicament").dataTable({
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
        // Configuration initiales des boites de dialogues
          $("#dlg_supp_seul").dialog({autoOpen : false});
          $("#dlg_supp_plus").dialog({autoOpen : false});
          $("#dialog_ajout").dialog({autoOpen : false});
          $("#dialog_ajout").dialog(
          {
                    minHeight : 300,
                    minWidth : 500,
                    modal : true,
                    autoOpen : false
         });
          $("#dialog_modification").dialog(
          {
                    minHeight : 300,
                    minWidth : 500,
                    modal : true,
                    autoOpen : false
         });
         // fonction appellée lors de l'ouverture de la boite du dialog de l'ajout d'un medicament pour reinitialiser  ses champs
         function reiniliaser(id){
            var champs=$('#'+id).find('input[type=text]');
            champs.val("");
         }
//************************* suppression d'un seul medicament ***********************************************//

          $('.supp_icon').live('click' , function(){
                var id=$(this).attr('id');                    //On recupere l'id du medicament a supprimer
                var data='id='+id+'&action=supprimer_seul';   //on prepare les arguments qui vont etre envoyés par la requete ajax
                $('#dlg_supp_seul .loader').css('display','none');
                $("#dlg_supp_seul").dialog( "option", "modal", true );
                $("#dlg_supp_seul").dialog("open");
                $("#dlg_supp_seul").dialog(           //Configuration de la boite de dialogue
                {                
                            minHeight : 100,
                            minWidth : 500,
                            modal : true,
                            buttons: 
                            {
                              "Oui": function()
                               {
                                $("#dlg_supp_seul .loader").css('display','inline'); //afficher le loader
                                  $.ajax(
                                  {
                                    type: 'POST', 
                                    url: 'medicament.php',
                                    data: data,
                                    cache: false,
                                    success: function()
                                      {
                                        $('#dlg_supp_seul').dialog("close"); // supprimer la ligne du medicament du dataTable
                                        cellule=$('#'+id).parent();
                                        ligne=cellule.parent();
                                        ligne.remove();
                                      }
                                  
                                  }); //Fin $.ajax()
                               },
                              "Annuler": function() 
                                {
                                       $(this).dialog("close");
                                }
                            }//fin accolade boutton

              });//fin dialog()
    });//fin 
//----------------------------------------------------------------------------------------------------------------------//
//**********************************Suppression de plusieurs medicaments************************************************//

$('#Supprimer').click(function()
{
      var tab_supp=new Array(); //initialisation du tableau qui va contenir les id des medicaments a supprimer
      $('input[type="checkbox"]').each(function()   // recuperation des id des medicaments selectionnes et les inserer dans le tableau 
      {
          if($(this).attr('checked'))
          {
            tab_supp.push($(this).attr('value'));
          }
      });

      if(tab_supp.length == 0)
      {
        alert('Vous n\'avez selectionner aucun medicament'); // si aucun medicament n'est selectionné on affiche un alert 
      }
      else
      {
            $("#dlg_supp_plus .loader").css('display','none');
            $('#dlg_supp_plus span').text(tab_supp.length); //Afficher dans la boite de dialogue le nombre de medicaments selectionnés pour la suppression
            $( "#dlg_supp_plus" ).dialog( "option", "modal", true ); // donner le focus a la boite de dialogue et desactiver le reste de la fenetre
            $("#dlg_supp_plus").dialog("open");
            $("#dlg_supp_plus").dialog(  //Configuration de la boite de dialogue
            {    
                  minHeight : 100,
                  minWidth : 700,
                  modal : true,
                  autoOpen : false,
                  buttons: 
                  {
                      "Oui": function() 
                      {
                        $("#dlg_supp_plus .loader").css('display','inline');
                        
                        $.ajax(
                        {
                            type: 'POST', 
                            url: 'medicament.php',
                            data: { medArray : tab_supp , action : 'supprimer_plus'},
                            async: false,
                            cache: false,
                            success: function()
                            {
                                  $("#dlg_supp_plus").dialog("close");
                                  $('input[type="checkbox"]').each(function()
                                  {
                                      if($(this).attr('checked'))
                                        {
                                          var cellule=$(this).parent();
                                          var ligne=cellule.parent();
                                          ligne.remove();
                                        }
                                  });
                            }//fin de success
                        }); //Fin de $.ajax()              
                      },// femeture oui : function()

                      "Annuler": function()
                      {
                        $(this).dialog("close");
                      }
                  }
            });// fermeture de dialog
      }//femeture de else  
}); // Fin
 //------------------------------------------------------------------------------------------------------------------//

 //**********************************Ajout d'un medicament **********************************************************//

$('#ajout_medicament').submit(function()
{
    var libelle=$('#libelle').val();    //Recuper les valeurs depuis le formulaire 
    var prix=$('#prix').val();
    var description=$('#description').val();
    $("#dialog_ajout .loader").css('display','inline');
    
    $.ajax(
    {

        type: 'POST', 
        url: 'medicament.php',
        data: 'action=ajouter&libelle='+libelle+'&prix='+prix+'&description='+description,
        async: false,
        cache: false,
        success: function(html)
          { 
            if(html==-1){
              alert("Les valeurs saisies ne correspondent pas aux critères!");
              $("#dialog_ajout .loader").css('display','none');
            }else{
              $('#data_medicament').append(html); //ajouter une nouvelle ligne contenant les infos du medicament dans le dataTable 
              $('#dialog_ajout').dialog("close"); //ensuite fermer la boite de dialogue
            }
          }
        
    });// fin de $.ajax()
    
       
  return false;
});
$('#Ajouter').click(function()
{
  $('#dialog_ajout .loader').css('display','none'); //cacher l'image du "load ""
  reiniliaser('ajout_medicament');
  $('#dialog_ajout').dialog('open');
});
$('#btn_annuler_ajout_medic').click(function()  //en cas de clique sur le bouton  "Annuler"
{
  $('#dialog_ajout').dialog('close');
});
//-------------------------------------------------------------------------------------------------------------------//

//********************************* Modification d'un medicament ****************************************************//
$('.lien_modif').live('click',function()
{
        //recuperation des données du medicament selectionné a partir de dataTable
       var id=$(this).attr('data-id');
       var lign=$(this).parent().parent();
       var libelle=lign.find('.libelle').text();
       var prix=lign.find('.prix').text();
       var description=lign.find('.description').text();

       //Insertion des recuperés depuis la dataTable dans les champs du formulaire 
       $('#modif_libelle').val(libelle);
       $('#modif_prix').val(prix);
       $('#modif_description').val(description);
       $('#id_medicament').val(id)
       $('#dialog_modification').dialog('open');
});

$('#modification_medicament').submit(function()
{
    $('#dialog_modification .loader').css('display','inline'); //afficher le "loader"
    //recuperer les valerus saisie dans le formulaire pour les transmmettre a ajax 
    var id=$('#id_medicament').val();
    var libelle=$('#modif_libelle').val();
    var prix=$('#modif_prix').val();
    var description=$('#modif_description').val();
 
  $.ajax(
    {

        type: 'POST', 
        url: 'medicament.php',
        data: 'action=modifier&id='+id+'&libelle='+libelle+'&prix='+prix+'&description='+description,
        async: false,
        cache: false,
        success: function(html)
          {
            if(html==-1){
              alert("Les valeurs saisies ne correspondent pas aux critères!");
              $("#dialog_ajout .loader").css('display','none');
            }else{
              //recuper Les valeurs  saisies dans le formulaire
              var id=$('#id_medicament').val();
              var libelle=$('#modif_libelle').val();
              var prix=$('#modif_prix').val();
              var description=$('#modif_description').val();
              var lign=$('#'+id).parent().parent();

              //actualisation des donneés du dataTable
              lign.find('.libelle').text(libelle);
              lign.find('.prix').text(prix);
              lign.find('.description').text(description);
              $('#dialog_modification .loader').css('display','none');//chacher l'image du "load"
              $('#dialog_modification').dialog("close"); //ensuite fermer la boite de dialogue 
            }
          }
       
    });// fin de $.ajax()

   return false;
});
 //Fermer la boite de dialogue lorsqu'on clique sur le bouton "Annuler" 
 $('#btn_annuler_modif_medic').click(function()
 {
       $('#dialog_modification').dialog('close');

 });
 //----------------------------------------------------------------------------------------------------------------//

 //************************************** Selectionner tout :checkbox**********************************************//
 $('#selectionner_tout').click(function()
 {
    var cases=$('td').find('input[type=checkbox]');
    if(this.checked)
    { // si 'selectionner_tout' est coché ,toutes les cases doivent etre cochées
            cases.attr('checked', true);
    }
    else
    { // si si 'selectionner_tout' n'est pas coché ,decocher toutes les cases 
      cases.attr('checked', false);
    }
 });
 //--------------------------------------------------------------------------------------------------------------------//
});


