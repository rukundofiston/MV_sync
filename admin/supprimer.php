<?php
require_once '../bootstrap.php';
require_once '../config.php';
extract($_GET);


$user_table = Doctrine_Core :: getTable ( 'Medecin' );
$elementa=$user_table->findOneByid_medecin($id); 

$elementa->delete();



?>