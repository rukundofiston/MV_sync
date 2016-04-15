<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('VisMed', 'doctrine');

/**
 * BaseVisMed
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_medicament
 * @property integer $id_visite
 * @property Medicament $Medicament
 * @property Visite $Visite
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVisMed extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('vis_med');
        $this->hasColumn('id_medicament', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('id_visite', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Medicament', array(
             'local' => 'id_medicament',
             'foreign' => 'id_medicament'));

        $this->hasOne('Visite', array(
             'local' => 'id_visite',
             'foreign' => 'id_visite'));
    }
}