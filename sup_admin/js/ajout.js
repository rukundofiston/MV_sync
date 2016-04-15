$(function(){
      $("#user_type").change(function(){
        decocher();
        var valeur=$('#user_type option:selected').val();
        if(valeur=="Delegue" || valeur=="Superviseur" || valeur=="Administrateur"){
          $("#gest_delegues").attr('checked','checked');
          $("#gest_medecins").attr('checked','checked');

        };
        if(valeur=="Superviseur" || valeur=="Administrateur"){
          $("#gest_statistiques").attr('checked','checked');
          $("#gest_medicaments").attr('checked','checked');
        };
        if(valeur=="Administrateur"){
          $("#gest_evenements").attr('checked','checked');
        };
      })
      function decocher(){
        $("#gest_delegues").attr('checked',false);
        $("#gest_medecins").attr('checked',false);
        $("#gest_statistiques").attr('checked',false);
        $("#gest_medicaments").attr('checked',false);
        $("#gest_evenements").attr('checked',false);
      }
        $("#user_type").change(function(){
          var valeur=$('#user_type option:selected').val();
          if(valeur=="Delegue" || valeur=="Superviseur"){
            $("#second_div").fadeOut();
            $("#lesButton").fadeOut();
            $("#first_div").fadeIn();
            $("#icon_next").fadeIn();
            //$("#second_div").removeAttr("style").fadeOut();
          }
          else if (valeur=="Administrateur"){
              $("#icon_next").hide();
              $("#first_div").fadeIn();
              $("#lesButton").fadeIn();
              //$("#second_div").fadeIn();
              
          }
        });

        $("#icon_next").click(function(){
              $("#first_div").hide();
              $("#icon_next").hide();
              $("#icon_back").fadeIn();
              $("#second_div").fadeIn();
              $("#lesButton").fadeIn();
        });

        $("#icon_back").click(function(){
              $("#first_div").fadeIn();
              $("#icon_next").fadeIn();
              $("#second_div").hide();
              $("#icon_back").hide();
              $("#lesButton").hide();
        });

        $("#dataNaissance").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true});
        $("#dateEmbauche").datepicker({ dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true });

        $("#Quitter").click(function(){
          $("#dialog").dialog("close");
        });

    function text_validate(id){
            var lname= $("#"+id);
            if(lname.val()==""){lname.addClass("error");}
          }
    $("#nom").blur(function(){
    text_validate("nom");
  });
    $("#prenom").blur(function(){
    text_validate("prenom");
  });
    $("#adresse").blur(function(){
    text_validate("adresse");
  });
    $("#tel").blur(function(){
    text_validate("tel");
  });
    $("#fax").blur(function(){
    text_validate("fax");
  });
    $("#email").blur(function(){
    text_validate("email");
  });
    $("#dataNaissance").blur(function(){
    text_validate("dataNaissance");
  });
    $("#dateEmbauche").blur(function(){
    text_validate("dateEmbauche");
  });
$("#user_name").blur(function(){
    text_validate("user_name");
  });
$("#password").blur(function(){
    text_validate("password");
  });
});