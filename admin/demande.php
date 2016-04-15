<?php
	require_once '../config.php';
	require_once '../bootstrap.php';
	extract($_POST);
	$action = (!isset($action))?"lister":$action;
	try{
		switch ($action) {

			//Récuperer la listes des demandes 
			case 'lister':
				$demandes = Doctrine_Core :: getTable ( 'Demande' )->findAll(null);
				$tab=array();
				foreach ($demandes as  $element) {
					//Recuperation de la date de la viste dans laquelle le medecin a fait une demande 
					$id_visite=$element->id_visite;
					$visite_table = Doctrine_Core :: getTable ( 'Visite' );
					$visite=$visite_table->findOneByid_visite ($id_visite); 
					//Recuperation de du medecin 
					$id_medecin=$visite->id_medecin;
					$medecin_table = Doctrine_Core :: getTable ( 'Medecin' );
					$medecin=$medecin_table->findOneByid_medecin($id_medecin);
					$nom=$medecin->nom;
					//Recuperation de l'objet,description et l'etat de la demande 
					$description=substr($element->description,0,50);
					$etat="";
					switch($element->etat)
					{
						case (-1): $etat="Non vue";
									break;
						case(0): $etat="En cours";
									break;
						case (1): $etat="Acceptée";
							break;
						case (2): $etat="Refusée";
							break;
						default:
						    break;
					}
					//Affectation des valeurs trouvées au tableau qui sera transmis a smarty
					$tab[]=array(
						'id' => $element->id_demande,
						'date' =>$visite->date,
						'medecin' =>$nom,
						'objet' =>$element->objet,
						'description' =>$description.'...',
						'etat' => $etat

						);
				}
				$smarty->assign('demandes',$tab);
				$smarty->display('admin/demande.tpl');
				break;
				//Modifier l'etat d'une demande d'n medecin 
			case 'modifier':
					$demande_table = Doctrine_Core :: getTable ( 'Demande' );
					$element=$demande_table->findOneByid_demande($id); 
					$element->etat=$etat;
					$element->save();
				break;

				//Visualiser l'objet et la description d'une demande d'un medecin 
			case 'visualiser':
					$demande_table = Doctrine_Core :: getTable ( 'Demande' );
					$element=$demande_table->findOneByid_demande($id);
					$smarty->assign('demande',$element);
					$smarty->display('admin/voir_demande.tpl');


				break;
			
				
			default:
				# code...

				break;
				
		}
			}catch(Doctrine_Connection_Exception $e){
				$e->getMessage();
				$title = "404 not found";
				$message = "La page demand&eacute;e est temporairement introuvable.";
				$smarty->assign("title", $title);
				$smarty->assign("message", $message);
				//$smarty->display("error.tpl");
			}
?>
