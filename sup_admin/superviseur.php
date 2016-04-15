<?php
include_once("../config.php");

extract($_GET);
$comptes = Doctrine_Core::getTable('Compte')->getDelegatesComptes("Superviseur")->execute();
$smarty->assign("comptes",$comptes);
$smarty->assign("tabl",$comptes);
$smarty->display("sup_admin/superviseur.tpl");