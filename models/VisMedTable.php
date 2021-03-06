<?php

/**
 * VisMedTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class VisMedTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object VisMedTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('VisMed');
    }

    public function getDrugs($id){
    	$q = Doctrine_Query::create() // Création de la requête
        ->select('vm.id_visite, m.id_medicament ,m.libelle, m.prix')
		->from('VisMed vm')
		->leftJoin('vm.Medicament m') // On joint les deux tables.
		->where('id_visite= ?', $id);
		return $q;
    }
}