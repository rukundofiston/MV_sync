<?php
require_once '../bootstrap.php';
require_once '../config.php';
extract($_POST);
$med=new Medecin();
$med->nom=$nom;
$med->prenom=$prenom;
$med->adresse=$adresse;
$med->tel=$telephone;
$med->sexe=$sexe;
$med->civilite=$civilite;
$med->photo=$photo;
$med->fax=$fax;
$med->email=$email;
$med->save();
echo '<tr>
							<td><input type="checkbox" name="choix" value="'.$med->id_medecin.'"/></td>
							<td>'.$med->nom.'</td>
						    <td>'.$med->prenom.'</td>
							<td>'.$med->adresse.'</td>
							<td>'.$med->fax.'</td>
							<td>'.$med->tel.'</td>
							<td>'.$med->sexe.'</td>
							<td>'.$med->civilite.'</td>
							<td class=" "><img id='.$med->id_medecin.' class="lien_supp" src="supprimer.png" /></td>
							<td><img id='.$medecin->id_medecin.' data-photo='.$medecin->photo.' class="lien_modif" src="modifier.png"/></td>
						</tr>';



?>