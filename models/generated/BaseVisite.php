<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Visite', 'doctrine');

/**
 * BaseVisite
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_visite
 * @property integer $id_delegue
 * @property integer $id_medecin
 * @property integer $id_rapport
 * @property integer $priorite
 * @property date $date
 * @property integer $etat
 * @property string $note
 * @property integer $vue
 * @property time $time
 * @property Delegue $Delegue
 * @property Medecin $Medecin
 * @property Rapport $Rapport
 * @property Doctrine_Collection $Demande
 * @property Doctrine_Collection $VisMed
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVisite extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('visite');
        $this->hasColumn('id_visite', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_delegue', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('id_medecin', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('id_rapport', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('priorite', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
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
        $this->hasColumn('etat', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('note', 'string', 254, array(
             'type' => 'string',
             'length' => 254,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('vue', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '-1',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('time', 'time', null, array(
             'type' => 'time',
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
        $this->hasOne('Delegue', array(
             'local' => 'id_delegue',
             'foreign' => 'id_delegue'));

        $this->hasOne('Medecin', array(
             'local' => 'id_medecin',
             'foreign' => 'id_medecin'));

        $this->hasOne('Rapport', array(
             'local' => 'id_rapport',
             'foreign' => 'id_rapport'));

        $this->hasMany('Demande', array(
             'local' => 'id_visite',
             'foreign' => 'id_visite'));

        $this->hasMany('VisMed', array(
             'local' => 'id_visite',
             'foreign' => 'id_visite'));
    }
}