<?php
	session_start();
	require_once("../config.php");
	if(check_session()){
		extract($_GET);
		extract($_SESSION);
		$action = (!isset($action))?"myReports":$action;
		switch ($action) {
			case 'myReports':
				$reports = Doctrine_Core::getTable("Rapport")->getAllById_delegue($user_id)->execute();
				$smarty->assign("reports", $reports);
				$smarty->display("reports.tpl");
				break;
			case 'generate':
				extract($_POST);
				if(!isset($date) || empty($date)){
					$date= date("y-m-d");
				}
				$visites = Doctrine_Core::getTable('Visite')->getAllInfos($date, 0, $user_id, null)->execute();// Recuperer les visites efféctué pour une date défini

//				getAllInfos($date=null, $etat=0, $id, $id_rapport=null)
				foreach ($visites as $key) {
					echo $key->id_visite." ".$key->id_delegue;
					echo "<br>";
				}
				$smarty->assign("date", $date);
				$smarty->assign("visites", $visites);
				$smarty->display("report-form.tpl");
				break;
			case 'add':// ajouter un rapport s'il n'existe pas 
				extract($_POST);
				if(isset($introduction) && isset($conclusion)){
					$rapport = Doctrine_Core::getTable("Rapport")->findOneBy("date", $date);
					if($rapport){ //si il existe on ve le rediriger vers le detail case ;) 
						echo $rapport->id_rapport;
					}else{
						$rapport = new Rapport();
						$rapport->date = $date;
						$rapport->id_delegue = $user_id;
						$rapport->save();
					}
					$rapport->introduction = $introduction;
					$rapport->conclusion = $conclusion;
					foreach ($ids as $id) {
						$visite = Doctrine_Core::getTable("Visite")->findOneBy("id_visite", $id);
						$visite->id_rapport = $rapport->id_rapport;
						$visite->save();
					}
					header("Location: reports.php?action=detail&id=".$rapport->id_rapport);
					/*
					*/
				}else{
					$title="Erreur";
					$message = "Une erreur s'est produite, nous allons essayer de le régler le plus tôt possible";
					$smarty->assign("title", $title);
					$smarty->assign("message", $message);
					$smarty->display("error.tpl");
				}
				break;
			case 'viewAll':
				if(strpos($rights, "delegue")){
					$reports = Doctrine_Core::getTable("Rapport")->getMyDelegatesReports($user_id)->execute(); // Il faut changer le parametre dans la fonction et le rendre plus strict
					$smarty->assign("reports", $reports);
					$smarty->display("reports.tpl");
				}else{
					show_errors($rights_title, $rights_message, $smarty);
				}	
				break;
			case 'detail':
				$id = $_GET['id'];
				if(isset($id) && !empty($id) && is_numeric($id)){
					if($report = Doctrine_Core::getTable("Rapport")->findOneBy("id_rapport", $id)){
						$visites = Doctrine_Core::getTable("Visite")
							->getAllInfos(null, 0, $report->id_delegue, $id)
							->execute();
						$smarty->assign("report", $report);
						$smarty->assign("date", $report->date);
						$smarty->assign("visites", $visites);
						$smarty->display("report.tpl");
					}else{
						show_errors(null, null, $smarty);
					}
				}else{

					show_errors(null, null, $smarty);
				}
				break;
			default:
				show_errors(null, null, $smarty);
				break;
		}
	}else{
		header("Location: login.php");
	}