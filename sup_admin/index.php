<?php
include_once("../config.php");
	extract($_GET);
	extract($_POST);
	$action = (!isset($action))?"view":$action;
	switch ($action){
		case 'view':
			$comptes = Doctrine_Core::getTable('Compte')->getDelegatesComptes("Delegue")->execute();
			$smarty->assign("comptes",$comptes);
			$smarty->display("sup_admin/delegue.tpl");
			break;

		case 'add':
			/*ici on ajoute un utilisateur selon son type*/
			if(isset($user_type) && !empty($user_type)){
				/*On ajoute les administrateurs*/
				if($user_type=="Administrateur"){
						$Compte=new Compte();
						$Compte->id_delegue=0;
						$Compte->login=$user_name;
						$Compte->passwd=md5($password);
						$valeur ="";
						foreach ($droits as $droit){
							$valeur .=$droit."|";
						}
						$Compte->droit=$valeur;
						$Compte->etat=$etat;
						$Compte->type=$user_type;
						$Compte->save();
				}	
				/*On ajoute les autres utilisateurs Délegues et superviseurs*/
				else{
					if (isset($user_name)&&isset($password)&&isset($nom)&&!empty($user_name)&&!empty($nom)&&!empty($prenom)){
						$Compte= new Compte();
					$Delegue=new Delegue();
					//je dois d'abbord uploader le fichier sur le serveur
					$filename=  $_FILES["imgfile"]["name"];
					if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg"))&& ($_FILES["imgfile"]["size"] < 2000000))
					{
						if(file_exists($_FILES["imgfile"]["name"]))
						{
							echo "File name exists.";
						}
						else
						{
							move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../upload/$filename");
						}				
					}
					else
					{		
						echo "invalid file.";
					}
					
					if($mySuperviseur){
						$Delegue->Del_id_delegue=$mySuperviseur;
					}
					else{
						$Delegue->Del_id_delegue=null;
					}
					$Delegue->dateEmbauche=$dateEmbauche;
					if(!empty($dataNaissance)) $Delegue->dataNaissance=$dataNaissance;
					else $Delegue->dataNaissance=null;
					$Delegue->nom=$nom;
					$Delegue->prenom=$prenom;
					$Delegue->adresse=$adresse;
					$Delegue->fax=$fax;
					$Delegue->tel=$tel;
					$Delegue->email=$email;
					$Delegue->image_url=$filename;
					$Delegue->save();

					$Compte->id_delegue=$Delegue->id_delegue;
					$Compte->login=$user_name;
					$Compte->passwd=md5($password);
					$valeur ="";
					foreach ($droits as $droit){
						$valeur .=$droit."|";
						}

						$Compte->droit=$valeur;
						$Compte->etat=$etat;
						$Compte->type=$user_type;
						$Compte->save();
						//pour assosier le delegue à son compte créer	
						$Delegue->id_compte=$Compte->id_compte;
						$Delegue->save();
				}	
			}
					}
					
			header ("Location: delegues.php");			
			break;

			case 'modify':

		    $Compte = Doctrine_Core ::getTable('Compte')->findOneBy('id_compte',$id);
            $Delegue= Doctrine_Core ::getTable('Delegue')->findOneBy('id_compte',$id);
            /*La modification de fait de la meme facon que l'ajout. Pour les admins on modifier l une table compte
            alors que pour lesdélégues et superviseurs on modifie la table compte et delegue */
			if ($Compte->type=="Administrateur") {
				$Compte->login=$user_name;
				if($password){
					$Compte->passwd=md5($password);
				}
				$valeur ="";
				foreach ($droits as $droit){
					$valeur .=$droit."|";
				}
			
				$Compte->droit=$valeur;
				$Compte->etat=$etat;
				$Compte->type=$user_type;
				$Compte->save();
				header("Location: comptes.php");
			}
			else{
				if($mySuperviseur){
						$Delegue->Del_id_delegue=$mySuperviseur;
					}
				$Delegue->dateEmbauche=$dateEmbauche;	
				if(!empty($dataNaissance)) $Delegue->dataNaissance=$dataNaissance;
				else $Delegue->dataNaissance=null;
				$Delegue->nom=$nom;
				$Delegue->prenom=$prenom;
				$Delegue->adresse=$adresse;
				$Delegue->fax=$fax;
				$Delegue->tel=$tel;
				$Delegue->email=$email;
				//unlink("img/upload/".$Delegue->image_url);
				if(isset($imgfile)){
					$Delegue->image_url=$imgfile;
				}
				$Delegue->save();

				$Compte->login=$user_name;
				if($password){
					$Compte->passwd=md5($password);
				}
				$valeur ="";
				foreach ($droits as $droit){
					$valeur .=$droit."|";
				}
				
				$Compte->droit=$valeur;
				$Compte->etat=$etat;
				$Compte->type=$user_type;
				$Compte->save();
				header("Location: delegues.php");
			}
			break;

		case 'delete':
			$delete_account= Doctrine_Core ::getTable('Compte')->findOneBy('id_compte',$id);
			
			if($delete_account->type=="Administrateur"){
				$delete_account->delete();
				header("Location: comptes.php");
				}
			else{
				$delete_delegue= Doctrine_Core ::getTable('Delegue')->findOneBy('id_compte',$id);
				$delete_delegue->delete();
				$delete_account->delete();
				header ("Location: delegues.php");
				}
			break;
		default:
			echo "wrong";
			break;
	}