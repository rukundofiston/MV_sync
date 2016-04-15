<?php
	require_once '../config.php';
	require_once '../bootstrap.php';
	extract($_POST);
	$action = (!isset($action))?"chercher_vente":$action;
	try{
		switch ($action) {

			//Récuperer la listes des medicaments et des secteurs 
			case 'chercher_vente':
				$medicaments = Doctrine_Core :: getTable ( 'Medicament' )->findAll(null);
				$smarty->assign('medicaments',$medicaments);
				$secteurs = Doctrine_Core :: getTable ( 'Secteur' )->findAll(null);
				$smarty->assign('secteurs',$secteurs);
				$smarty->display('admin/vente.tpl');
				break;

			//Consulter les ventes d'un medicament pour une periode donnée
			case 'consulter':
				$rslt= Doctrine_Query::create()
				->select('v.date,v.qte')
				->from('Vente v')
				->where('v.id_secteur= ?', $id_secteur)
				->andWhere('v.id_medicament=?', $id_medicament)
				->andWhere('v.date BETWEEN "'.$date_debut.'" and "'.$date_fin.'"')
				->orderBy('date ASC')
				->execute();
				$tab[] = array();
				foreach($rslt as $elem)
					{
						$tab[]=array($elem['date'],(int)$elem['qte']);
					}
					echo json_encode($tab);
				break;

				//Ajouter une vente concernant un medicament dans une zone lors dune date 
				case 'ajouter':

				$v=new Vente();
				$v->id_medicament=$id_medicament;
				$v->id_secteur=$id_secteur;
				$v->date=$date;
				$v->qte=$qte;
				$v->save();
				break;
				//Generer l'etat d'une vente dans une zone pendant un periode 
				case 'generer_etat':
					
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
