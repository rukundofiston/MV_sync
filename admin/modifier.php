<?php

require_once '../bootstrap.php';
require_once '../config.php';
extract($_GET);
extract($_POST);
echo $id;
$user_table = Doctrine_Core :: getTable ( 'Medecin' );
$med=$user_table->findOneByid_medecin($id); 



$med->nom=$nom;
$med->prenom=$prenom;
$med->adresse=$adresse;
$med->tel=$tel;
$med->sexe='S';
$med->civilite='Mar';
$med->photo='photo';
$med->email='dcfdc';
$med->save();





//header("Location:index.php");

?>