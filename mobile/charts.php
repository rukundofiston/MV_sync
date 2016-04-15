<?php
	/**
 *@author : ELQANDILI Yassine
 */
	include("../config.php");
	extract($_GET);
	$action = (!isset($_GET['action']))?"file":$action;
	switch ($action) {
		case 'getData':
			extract($_POST);
			//$id_medicament = 2;
			$id_secteur=(!empty($_POST['id_subSecteur']))?$_POST['id_subSecteur']:$_POST['id_secteur'];
			$ventes= Doctrine_Query::create()
			->select('v.date,v.qte')
			->from('Vente v')
			->where('v.id_medicament='.$id_medicament)
			->andWhere('v.date BETWEEN "'.$date_debut.'" and "'.$date_fin.'"')
			->andWhere('v.id_secteur = ?', $id_secteur)
			->orderBy('date ASC')
			->execute();
			$response = array();
			foreach ($ventes as $vente) {
				$response[] = array($vente->date,(int)$vente->qte);
			}
			echo json_encode($response);
			break;
		case 'file':
			$drugs = Doctrine_Core::getTable("Medicament")->findAll();
			$sectors = Doctrine_Core::getTable("Secteur")->getSubSectors(null)->execute();
			$smarty->assign("drugs", $drugs);
			$smarty->assign("sectors", $sectors);
			$smarty->display("charts.tpl");
			break;
		case 'getSubSectors':
			extract($_GET);
			if(is_numeric($id_secteur) && !empty($id_secteur) && $_POST['request']=="ajax"){
				$subSectors = Doctrine_Core::getTable('Secteur')->getSubSectors($id_secteur)->execute();
				$smarty->assign("sectors", $subSectors);
				$smarty->display("sectors.tpl");
			}
			break;
		default:
			# code...
			break;
	}