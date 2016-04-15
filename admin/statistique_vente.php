<?php
require_once '../config.php';

extract($_POST);
$rslt= Doctrine_Query::create()
->select('v.date,v.qte')
->from('Vente v')
->where('v.id_secteur='. $id_secteur)
->andWhere('v.id_medicament='.$id_medicament)
->andWhere('v.date BETWEEN "'.$date_debut.'" and "'.$date_fin.'"')
->execute();
foreach($rslt as $elem)
{
	settype($elem['qte'],int);
	$tab[]=array($elem['date'],(int)$elem['qte']);
}


	echo json_encode($tab);
?>