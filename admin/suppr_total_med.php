<?php
require_once '../bootstrap.php';
extract($_POST);
foreach ($medArray as $elem) {
	$user_table = Doctrine_Core :: getTable ( 'Medecin' );
	$elementa=$user_table->findOneByid_medecin($elem); 
	$elementa->delete();
}






?>