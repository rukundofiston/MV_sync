<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Vente', 'doctrine');

/**
 * BaseVente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_vente
 * @property integer $id_medicament
 * @property integer $id_secteur
 * @property integer $qte
 * @property date $date
 * @property Secteur $Secteur
 * @property Medicament $Medicament
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVente extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('vente');
        $this->hasColumn('id_vente', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_medicament', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('id_secteur', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('qte', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('date', 'date', null, array(
             'type' => 'date',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Secteur', array(
             'local' => 'id_secteur',
             'foreign' => 'id_secteur'));

        $this->hasOne('Medicament', array(
             'local' => 'id_medicament',
             'foreign' => 'id_medicament'));
    }
}