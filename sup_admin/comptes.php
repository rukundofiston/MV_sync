<?php
	include_once("../config.php");
	extract($_GET);
	$action = (!isset($action))?"view":$action;
	switch ($action) {
		case 'view':
		$comptes = Doctrine_Core::getTable('Compte')->findAll();
		$Superviseur = Doctrine_Core::getTable('Compte')->getDelegatesComptes("Superviseur")->execute();
		$smarty->assign("comptes",$comptes);
		$smarty->assign('tabl',$Superviseur);
		$smarty->display("sup_admin/comptes.tpl");
			break;
		case 'getCompte':
			if($id){
				$compte = Doctrine_Core::getTable("Compte")->findOneBy("id_compte", $id);
				$delegue = Doctrine_Core::getTable("Delegue")->findOneBy("id_compte", $id);
				if ($compte->type=="administrateur"){
					$response = array(
							"login"=>$compte->login,
							"droits"=>$compte->droit,
							"etat"=>$compte->etat,
							"types"=>$compte->type
							);
					echo json_encode($response);
				}
				else{
					$response = array(
							"login"=>$compte->login,
							"droits"=>$compte->droit,
							"etat"=>$compte->etat,
							"types"=>$compte->type,
							
							"dateEmbauche"=>$delegue->dateEmbauche,
							"dataNaissance"=>$delegue->dataNaissance,
							"nom"=>$delegue->nom,
							"prenom"=>$delegue->prenom,
							"adresse"=>$delegue->adresse,
							"fax"=>$delegue->fax,
							"tel"=>$delegue->tel,
							"email"=>$delegue->email
							);
					echo json_encode($response);
				}	
			}
			break;
		case 'getDelegues':
		$delegues = Doctrine_Core::getTable("Delegue")->mesDelegues($id)->execute();
		$smarty->assign('tab',$delegues);
		$smarty->display('sup_admin/liste_delegues.tpl');
			break;

		case 'getSuperviseur':
			
			$Superviseur = Doctrine_Core::getTable('Compte')->getDelegatesComptes("Superviseur")->execute();
			$smarty->assign('tabl',$Superviseur);
			$smarty->display('ajout.tpl');

			break;
		default:
			break;
	}
