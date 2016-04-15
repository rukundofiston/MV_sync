<?php
	require_once '../config.php';
	require_once '../bootstrap.php';
	extract($_POST);
	extract($_GET);
	$action = (!isset($action))?"lister":$action;
	try{
		switch ($action) {

			//Récuperer la listes des evenements 
			case 'lister':
				$evenements = Doctrine_Core :: getTable ( 'Evenement' )->findAll(null);
				$tab=array();
				foreach ($evenements as  $element) {
					//Recuperation de la date de la viste dans laquelle le medecin a fait une demande 
					$id_delegue=$element->id_delegue;
					$delegue_table = Doctrine_Core :: getTable ( 'Delegue' );
					$delegue=$delegue_table->findOneByid_delegue($id_delegue); 
					$nom=$delegue->nom;
					$prenom = $delegue->prenom;

					//Affectation des valeurs trouvées au tableau qui sera transmis a smarty
				$tab[]=array(
						'event' => $element,
						'nom' => $nom,
						'prenom'=> $prenom
						);
				}
				$smarty->assign('evenements',$tab);
				$smarty->display('admin/evenement.tpl');
				break;
				case 'complete':
					$rslt= Doctrine_Query::create()
					->select('nom,prenom')
					->from('Delegue')
					->where("nom LIKE '%$mot%'")
					->orWhere("prenom LIKE '%$mot%'")
					->orderBy('id_delegue DESC')
					->limit(5)
					->execute();
					$smarty->assign('tab',$rslt);
					$smarty->display('admin/complete_evenement.tpl');
					break;
				case 'ajouter':
					$evnt=new Evenement();
					$evnt->dataD=$dateD;
					$evnt->dateF=$dateF;
					$evnt->titre=$titre;
					$evnt->heureD=$heureD;
					$evnt->heureF=$heureF;
					$evnt->description=$description;
					$evnt->lieu=$lieu;
					$evnt->id_delegue=$delegue;
					$evnt->save();
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
