<?php
/*
 *@author Yassine ELQANDILI
 *@utilité : gestion des visites d'un délégué :D
 *
*/	
	session_start();	
	require_once("../config.php");
	if(check_session()){
		extract($_GET);
		$user_id = $_SESSION['user_id'];
		$action = (!isset($action))?"view":$action;
		try{
			switch ($action) {
				case 'viewAll':// toutes les visites a savoir les ancienne visites 
						$tasksTable = Doctrine_Core::getTable('Visite');
						$tasks = $tasksTable->getUpcomigVisites(date("Y-m-d"), $user_id)->execute();
						$oldTasks = $tasksTable->getOldVisites(date("Y-m-d"), 0, $user_id)->execute();
						if(count($oldTasks)<0){
							$smarty->assign("allVisites", false);
						}else{
							$smarty->assign("allVisites", true);
						}						
						$smarty->assign("sortable", "not-sortable");
						$smarty->assign("oldTasks", $oldTasks);
						$smarty->assign("tasks", $tasks);
						$smarty->display("tasks.tpl");
					break;
				case 'view':// voir les visites non traité
						$date = date("Y-m-d");
						$tasks = Doctrine_Core::getTable('Visite');
						$tasks = $tasks->getAllVisites($date, -1, $user_id)->execute();
						$smarty->assign("sortable", "sortable");
						$smarty->assign("tasks", $tasks);
						$smarty->assign("allVisites", false);
						$smarty->display("tasks.tpl");
					break;
				case 'viewDone':// voir les visites non términé
						$date = $date = date("Y-m-d");
						$tasks = Doctrine_Core::getTable('Visite');
						$tasks = $tasks->getAllVisites($date, 0, $user_id)->execute();
						$smarty->assign("sortable", "not-sortable");
						$smarty->assign("tasks", $tasks);
						$smarty->assign("allVisites", false);
						$smarty->display("tasks.tpl");
					break;
				case 'viewCanceled':// vois les visites annulé 
						$date = $date = date("Y-m-d");
						$tasks = Doctrine_Core::getTable('Visite');
						$tasks = $tasks->getAllVisites(null, -2, $user_id)->execute();
						$smarty->assign("sortable", "not-sortable");
						$smarty->assign("tasks", $tasks);
						$smarty->assign("allVisites", false);
						$smarty->display("tasks.tpl");
					break;
				case 'detail':
					extract($_GET);
					if(!empty($id) && is_numeric($id)){
						if($visite = Doctrine_Core::getTable('Visite')->findOneBy('id_visite', $id)){ // if there's noo visite with that id ;) 
							if($visite->id_delegue==$user_id){
								$medecin = Doctrine_Core::getTable('Medecin')->findOneBy('id_medecin', $visite->id_medecin);
								$vm =Doctrine_Core::getTable('VisMed')->getDrugs($id);
								$demandes = Doctrine_Core::getTable('Demande')->findBy("id_visite", $id);
								/*
								 *@vm = un objet de la table VisMed qiu relie les visites et les medicament
								 *@getDrugs est une fonction qui retourne un objet de type Query ;)
								 */
								$drugs = $vm->execute();
								$smarty->assign('drugs', $drugs);
								$smarty->assign('visite', $visite);
								$smarty->assign('doctor', $medecin);
								$smarty->assign('demandes', $demandes);
								$smarty->display('task.tpl');
							}else{
								show_errors($rights_title, $rights_message, $smarty);
							}
						}else{// noo visite with that id on the GET 
							//$title = "Error 404 - Page introuvable.";
							//$message = "La page que vous chercher n'existe pas ou à été déplacé, utiliser les menus pour acceder aux contenus que vous voullez";
							show_errors(null, null, $smarty);
						}
					}else{
						show_errors(null, null, $smarty);
					}
					break;
				case 'finish': // triggers when the user clicks finish ;)
					if(isset($id) && is_numeric($id)){
						if($visite = Doctrine_Core::getTable('Visite')->findOneBy('id_visite', $id)){
							if($visite->id_delegue==$user_id){
								$date = date("Y-m-d");
								$visite->etat = 0;
								$visite->vue = -1;
								$visite->date = $date;
								$visite->time = date("H:i:s");
								$visite->save();
								header("Location: tasks.php");
							}else{
								show_errors($rights_title, $rights_message, $smarty);
							}
						}
					}else{
						show_errors(null, null, $smarty);
					}
					break;
				case 'delay':// using ajax ;)
					extract($_POST);
					if(isset($id) && !empty($id)){
						if(isset($date) && !empty($date)){
							if($visite = Doctrine_Core::getTable('Visite')->findOneBy('id_visite', $id)){
								if($visite->id_delegue==$user_id){
									$visite->date= $date;
									$visite->save(); //reporter
									$response = array(
												"success" => true,
												"message" => "Visite report&eacute;"
												);
								}else{
									$response = array(
												"success" => true,
												"message" => $rights_message
												);
								}
							}else{
								$response = array(
									'success' => false,
									'message' => utf8_encode($no_visite)
									);
							}
						}else{
							$response = array(
										"success" => false,
										"message" => "Vous avez une erreur quelque part"
										);
						}
						echo json_encode($response);
					}
					break;
				case 'cancel': // using ajax ;)
					if(!empty($id)){
						if($visite = Doctrine_Core::getTable("Visite")->findOneBy('id_visite', $id)){
							if($visite->id_delegue == $user_id){
								$visite->etat = -2;
								$visite->save();
								$response = array(
											'success' => true,
											'message' => utf8_encode("visite annulé")
											);
							}else{
								$response = array(
											'success' => true,
											'message' => utf8_encode($rights_message)
											);
							}
						}else{
							$response = array(
									'success' => false,
									'message' => utf8_encode($no_visite)
									);
						}
					}else{
						$response = array(
									'success' => false,
									'message' => utf8_encode("Une erreur s'est produite")
									);
					}
					echo json_encode($response);
					break;
				case 'deleteDemande':// Delete Demande if u have the right to do it of course ;)
					if(isset($id) && !empty($id)){
						if($demande = Doctrine_Core::getTable('Demande')->findOneBy('id_demande', $id)){
							if($demande->id_delegue==$user_id){
								$demande->delete();
								$response = array(
									'success'=> true,
									'type'=> 'noError');
							}else{
								$response = array(
									'success'=> true,
									'type'=> 'Error',
									'title'=> 'Ooops',
									'message'=> 'Somthing went wrong, all we know ;)');
							}
						}else{
							$response = array(
								'success'=> true,
								'type'=> 'Error',
								'title'=> "Ooops",
								'message'=> "Somthing went wrong, all we know ;)"
								);
						}
					}else{
						$response = array(
								'success'=> true,
								'type'=> 'Error',
								'title'=> "Ooops",
								'message'=> "Dont know"
								);
					}
					echo json_encode($response);
					break;
				case 'addnote':// Add a note to a visite (also if u got the permssions :p )
					if(isset($id) && !empty($id)){
						extract($_POST);
						if(!empty($note)){
							if($visite = Doctrine_Core :: getTable ( 'Visite' )->findOneBy('id_visite', $id)){
								if($visite->id_delegue==$user_id){
									$visite->note = $note;
									$visite->save();
									echo 0;
								}else{
									echo -1;
								}
							}else{
								echo -1;
							}
						}else{
							echo -1;
						}
					}
					break;
				case 'addForm': // show the form with the doctors select ;) 
					$return = null;
					$doctors = Doctrine_Core::getTable('Medecin')->getDoctors()->execute();
					$smarty->assign("doctors", $doctors);
					$smarty->display("form_task.tpl");
					break;
				case 'step1':
					extract($_POST);
					if(!empty($doctors)){ // la variable doctors contient les valeurs récupéré par le formulaire (les docs coché)
						$i = 1;
						foreach ($doctors as $id) { //pour chaque element coché nous allons créer une visite
							$visite = new Visite();
							$date = date("Y-m-d");
							$visite->id_medecin = $id;
							$visite->id_delegue = $user_id;
							$visite->priorite = $i;
							$visite->date = $date;
							$visite->etat = -1;
							$visite->vue = -1;
							$visite->save();
							$ids_visite[]= $visite->id_visite;
							$i++;
						}
						$v = Doctrine_Core::getTable('Visite');
						$new_visites = $v->getVisites_Doctors($ids_visite)->execute();
						$smarty->assign("visites",$new_visites);
						$smarty->display("doctors-order.tpl");
					}else{
						header("Location: tasks.php?action=addForm");
					}
					break;
				case 'addDemande':// pour ajouter une demande c'est trèès simple ahh .. wi mé JqueryMobile sucks 
					extract($_POST);
					if(isset($id)){
						if($visite= Doctrine_Core::getTable("Visite")->findOneBy('id_visite', $id)){
							if($visite->id_delegue == $user_id){
								$demande = new Demande();
								$demande->id_visite = $id;
								$demande->id_delegue = $user_id;
								$demande->description = $description;
								$demande->etat = 0;
								$demande->objet = $type;
								$demande->save();
								$response = array(
											"response"=> 0,
											"id"=>$demande->id_demande
											);
							}else{
								$response = array(
											"response"=> -1,
											);
							}
						}else{
							$response = array(
											"response"=> -1
											);
						}
						$response = json_encode($response);
						echo $response;
					}
					break;
				case 'drugs-select':
					$drugs = Doctrine_Core::getTable('Medicament')->findBy("etat", 0);
					$smarty->assign("drugs", $drugs);
					$smarty->display("medicament-select.tpl");
					break;
				case 'addMedicament':
					if(!empty($id)){
						extract($_POST);
						if(!empty($drugs)){
							foreach ($drugs as $drug) {
								$VisMed = Doctrine_Query::create()
										->from('VisMed v')
										->where('v.id_visite = ?', $id)
										->andWhere('v.id_medicament= ?', $drug)
										->execute();
								if(count($VisMed)==0){
									$vis_med = new VisMed();
									$vis_med->id_visite = (int)$id;
									$vis_med->id_medicament = (int)$drug;
									$vis_med->save();
								}
							}
							echo 0;
						}
					}
					break;
				case 'reorder': // reordonner les taches :D
					extract($_POST);
					$v = Doctrine_Core::getTable('Visite'); // recuperer la table Visite et appeler la fonction update pour l'ensemble des IDS
					$v->updatePiorities($id);// updatePiorities existe dans la classe VisiteTable ;) 
					break;
				default:
					show_errors(null, null, $smarty);
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
	}else{
		header("Location: login.php");
	}