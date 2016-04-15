<?php
require_once '../bootstrap.php';
require_once '../config.php';
extract($_POST);
$user_table = Doctrine_Core :: getTable ( 'Medecin' );
$element=$user_table->findOneByid_medecin($id);  	
$element->lat=$lat;
$element->lng=$lng;
$element->save();
?>