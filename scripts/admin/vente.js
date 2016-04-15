//*************************************** Configuration des widgets de Jquery UI **************************************//
$(function(){
$("#dialog_ajout_vente").dialog({
	minHeight : 300,
	minWidth : 500,
	modal : true,
	autoOpen : false
});
$( "#date" ).datepicker({
    changeMonth: true,
	changeYear: true
});
$( '#date' ).datepicker( "option", "dateFormat","yy-mm-dd");
$( "#debut" ).datepicker
	    ({
			changeMonth: true,
			changeYear: true
      	});
$( "#fin" ).datepicker
	    ({
			changeMonth: true,
			changeYear: true
      	});
$( '#debut' ).datepicker( "option", "dateFormat","yy-mm-dd");
$( '#fin' ).datepicker( "option", "dateFormat","yy-mm-dd");
$( "#slider-range-min" ).slider
	({
		range: "min",
		value: 50,
		min: 1,
		max: 1500,
		slide: function( event, ui ) {
		    $( "#amount" ).val(ui.value );
		}
    });
 $( "#amount" ).val( "" + $( "#slider-range-min" ).slider( "value" ) );
 });
 //--------------------------------------------------------------------------------------------------------------------//

//******************************************** Ajout d'une vente *****************************************************//
//Lorsque l'utilisateur clique sur le bouton "Ajouter une vente"
$('#ajouter').click(function(){
	 $('#secteur option').each(function()
	 {
	      $('#sect').append('<option value='+$(this).attr('value')+'>'+$(this).text()+'</option>');
	 });
	 $('#medicament option').each(function()
	 {
	      $('#med').append('<option value='+$(this).attr('value')+'>'+$(this).text()+'</option>');
	 });

	 $('#date').val('');
	 $('#dialog_ajout_vente').dialog('open');
});

//Lorsque l'utilisateur soumit le formulaire 
$('#ajout_vente').submit(function(){
	//recuprer les valeurs saisies et choisies par l'utilisateur
	var id_secteur=$("#sect option:selected").val();            
	var id_medicament=$("#med option:selected").val(); 
	var date=$('#date').val();
	var qte=$('#amount').val();
	if(id_secteur == "" || id_medicament == "" || date == "" || qte == "") //Tester si l'utilisateur a rempli tous les champs
	{
		alert('Vous devez remplir tous les champs ');
	}
	else{

		$("#dialog_ajout_vente .loader").css('display','inline'); //afficher le loader 
		//Envoi de la requete ajax 
   				$.ajax({
				type: 'POST',	
				url: 'vente.php',
				data: 'action=ajouter&id_secteur='+id_secteur+'&id_medicament='+id_medicament+'&date='+date+'&qte='+qte,
				async: false,
				cache: false,
				success: function(html)
					{	
						$('#dialog_ajout_vente').dialog("close");
					  	$("#dialog_ajout_vente .loader").css('display','none');
					}
				
				});
	}
return false;
});
$('#btn_annuler_ajout_vnt').click(function(){
	$('#dialog_ajout_vente').dialog('close');
});	

//---------------------------------------------------------------------------------------------------//

//*************** Consulter Les ventes d'un medicament dans une zone lors d'une periode *************//
$('#btn_consult_vente').click(function(){
// Récuperer les valeurs saisies par l'utilsateur 
var id_secteur=$("#secteur option:selected").attr('value'); 
var id_medicament=$("#medicament option:selected").attr('value'); 
var date_debut=$("#debut").val();
var date_fin=$("#fin").val();

// Tester si l'utilisateur n'a pas laissé les champs des dates (Debut & Fin) vides 
if(date_debut == "" || date_fin =="")
{
	alert('Vous devez determiner la date de debut et de fin !');
}
else{
/* Recuperer les valeurs des champs contenant les dates de debut et de fin ,Pour les convertir 
   en dates puis les comparer
*/
var date_1=getDate(date_debut);//Appel a la fonction getDate qu'on a definé pour convertir une chaine en objet date 
var date_2=getDate(date_fin);
var resutl=compare(date_1,date_2); //appel a la fonction compare qui compare compare 2 dates et retourn un nombre 

//Si la date de debut est > la date de fin 
	if(resutl == 1)
	 {
		 alert('Vous avez sélectionné  une date de debut supeieur par rapport à la date de fin ! ');
	 }
 //Si la date de debut == la date de fin
	 else if(resutl == 0)
	 {
		 alert('Vous avez selectionné la même valeur pour la date de debut et la date de fin !');
	 }
	 else{
	 	$('.load').css('display','inline');
	 $.ajax({
	 	type: 'POST',
	 	dataType : 'json',
	 	url: 'vente.php',
	 	data: 'action=consulter&id_secteur='+id_secteur+'&id_medicament='+id_medicament+'&date_debut='+date_debut+'&date_fin='+date_fin,
	 	async: false,
	 	cache: false,
	 	success: function(reponse)
	 	{	$('.load').css('display','none');
	 		//S'il le serveur renvoie une reponse nulle suite a la requete de l'utilisateur 
	 		if(reponse == null)
	 		{
	 			alert('Il n\'ya pas des données disponbiles concernants ce medicament pour la periode que vous aves désigné' );
	 		}
	 		else
	 		{	
	 			//Prepartion des données "d7" qui vont etre passées a la bibliotheque FLOT Jquery
	 			d7 =[];
				for (var i = 0; i < reponse.length; i++)
				{
					d7.push([(new Date(reponse[i][0])).getTime(), reponse[i][1]]);
				}
				//Configuration de Flot 
		        plotarea=$("#chart_div"); //Recuperer la div qui va contenir le "Chart"
		        $.plot( plotarea , [{
		          	label : 'Les Ventes', //Titre du diagramme
		          	data: d7,			  //Les données que va representer le diagramme
		          	lines : {show : true, fill: true} // Type de diagramme :lines
		        }]);

				$.plot($("#chart_div"), [d7], {
					lines: {show: true}, 
					legend: {
				    show: true,
				    margin: 10,
				    backgroundOpacity: 0.5
				  	},

			    points: {   //pour representer les données sous formes des "points" avec avec des coins arrondis
				    show: true,
				    radius: 3
				    }, 
		     	xaxis: { // Configuration de L'axe des abscisses 
			        mode: "time",  
			        minTickSize: [1, "day"],
			        timeformat: "%y/%m/%d" 
	            	}
	      		});//Fermeture de $.plot()
			}//Fermeture du troisieme else
		}//Fermeture de success: function(reponse)
	  });//Fermeture de $.ajax()
	}//Fermeture du deuxieme else
}//Fermeture du premier else 
});//Fin
//------------------------------------------------------------------------------------------------------------------//

//******************************* Definition des fonctions : "getDate" & "Compare"  ********************************//

function getDate(string_Date)
{	  
	year = string_Date.substring(0,4);//extraire de la chaine la partie qui represente l'année
	month = string_Date.substring(5,7); //extaraire de chaine la partie qui represente de le mois 
	day = string_Date.substring(8,10); //extaraire de chaine la partie qui represente de le jour
	d = new Date();						//Creer un objet de type Date que la fonction va retourner 
	d.setDate(day);						//Inserer chacune des données extraites de la chaine dans l 'objet Date 
	d.setMonth(month);
	d.setFullYear(year); 
  return d;  
}
function compare(date_1, date_2)
{
	diff = date_1.getTime()-date_2.getTime(); //recuperer le timeStamp des 2 dates avec la fonction getTime puis faire la diffrence d
  return (diff==0?diff:diff/Math.abs(diff));//Evaluer la diffirence du tempStamp des 2 dates suivant une expression ternaire 
}
//-----------------------------------------------------------------------------------------------------------------//

//**************************************** Generation de l'etat de vente ******************************************//
$("#vente_form").submit(function(){
	var date_debut=$("#debut").val();
	var date_fin=$("#fin").val();
	if(date_debut == "" || date_fin =="")
	{
		alert('Vous devez determiner la date de debut et de fin !');
		return false;
	}else{
		return true;
	}
});
//--------------------------------------------------------------------------------------------------------------------//
