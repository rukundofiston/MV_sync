<?php
	require_once '../config.php';
	extract($_POST);
	$action = (!isset($action))?"lister":$action;
	try{
		switch ($action) {

			//Afficher la liste des medecins
			case 'lister':
					$array1 = Doctrine_Core :: getTable ('Type')->findAll(null);
					$smarty->assign('tab_type',$array1);
					//$smarty->display("admin/medecin.tpl");
					

				 $rslt= Doctrine_Query::create()
				    ->from('Medecin m')
				    ->leftJoin('m.Type')
				    ->where('etat=0')
			    	->execute();
					$smarty->assign('tab',$rslt);
					$smarty->display("admin/medecin.tpl");
				break;

			//Ajouter un medecin
			case 'ajouter':
					$med=new Medecin();
					$med->nom=$nom;
					$med->prenom=$prenom;
					$med->adresse=$adresse;
					$med->tel=$tel;
					$med->sexe=$sexe;
					$med->civilite=$civilite;
					$med->photo=$photo;
					$med->fax=$fax;
					$med->email=$email;
					$med->etat=0;
					$med->id_type1 = $type;
					$med->save();
					$type1=Doctrine_Core::getTable("Type")->findOneByid_type($type);
					$smarty->assign('type',$type1->libelle);
					$smarty->assign('id_type',$type1->id_type);
					$smarty->assign('med',$med);
					$smarty->display('admin/ajout_medecin.tpl');
				break;
			//Enregistrer localisation medecin
				case 'localiser':
					$medecins_table = Doctrine_Core :: getTable ( 'Medecin' );
					$element=$medecins_table->findOneByid_medecin($id);  	
					$element->lat=$lat;
					$element->lng=$lng;
					$element->save();
				break;

			//Supprimer un medecin
				case 'supprimer_seul':
					$user_table = Doctrine_Core :: getTable ( 'Medecin' );
					$element=$user_table->findOneByid_medecin($id); 
					$element->etat = -2;
					$element->save();
				break;
			//Modifer le profil d'un medecin
				case 'modifier':
				print_r($_POST);
				$user_table = Doctrine_Core :: getTable ( 'Medecin' );
				$element=$user_table->findOneByid_medecin($id); 
				$element->nom=$nom;
				$element->prenom=$prenom;
				$element->adresse=$adresse;
				$element->tel=$tel;
				$element->sexe=$sexe;
				$element->civilite=$civilite;
				$element->photo=$photo;
				$element->fax=$fax;
				$element->id_type1=(int)$type;
				$element->email=$email;
				$element->save();
				break;


			//supprimer plusieurs medecins
				case 'supprimer_plus':
					foreach ($medArray as $elem) {
						$user_table = Doctrine_Core :: getTable ( 'Medecin' );
						$elementa=$user_table->findOneByid_medecin($elem); 
						$element->etat=-2;
						$element->save();
					}
				break;

			//Recuperer les infos d'un medecin pour les afficher dans la boite de dialogue de modification7
				case 'recuperer_info':
					$user_table = Doctrine_Core :: getTable ( 'Medecin' );
					$elementa=$user_table->findOneByid_medecin($elem); 
					/*$tab=array(
								"nom" =>,
								"prenom" =>,
								"adresse" =>,
								"telephone" =>,
								"sexe" =>,
								"civilite" =>,
								"photo" =>,
								"fax" =>,


						);*/
					
				break;

			//Default 
				default:
					header("Location: index.php");
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




