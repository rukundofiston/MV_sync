<?php
	require_once '../config.php';
	require_once '../bootstrap.php';

	extract($_POST);
	$action = (!isset($action))?"lister":$action;
	try{
		switch ($action) {

			//Afficher la liste des medicaments
			case 'lister':
					$array1 = Doctrine_Core::getTable( 'Medicament' )->getDrugs()->execute();
					$smarty->assign('tab_medics',$array1);
					$smarty->display("admin/medicament.tpl");
				break;
			//Supprimer un seul medicament 
			case 'supprimer_seul':
					$user_table = Doctrine_Core :: getTable ( 'Medicament' );
					$element=$user_table->findOneByid_medicament($id);
					$element->etat= -1;
					$element->save();
				break;
			//Supprimer plusieurs medicaments
			case 'supprimer_plus':
					foreach ($medArray as $elem)
					 {
							$medic_table = Doctrine_Core :: getTable ( 'Medicament' );
							$element=$medic_table->findOneByid_medicament($elem); 
							$element->etat =-1;
							$element->save();
					  }

				break;
			//Ajouter un medicament
			case 'ajouter':
			if(!empty($libelle) && !empty($prix) && !empty($description) && is_numeric($prix))
			{
					$medicament=new Medicament();
					$medicament->libelle=$libelle;
					$medicament->prix=$prix;
					$medicament->desctiption=$description;
					$medicament->save();
					$smarty->assign('medicament',$medicament);
					$smarty->display('admin/ajout_medicament.tpl');
             }else{
             	echo -1;
             }
				break;
			case 'modifier':
				if(!empty($libelle) && !empty($prix) && !empty($description) && is_numeric($prix)){
					$user_table = Doctrine_Core :: getTable ( 'Medicament' );
					$element=$user_table->findOneByid_medicament($id); 
					$element->libelle=$libelle;
					$element->prix=$prix;
					$element->desctiption=$description;
					$element->save();
				}else{
					echo -1;
				}
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