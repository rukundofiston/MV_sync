<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Personne', 'doctrine');

/**
 * BasePersonne
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_personne
 * @property string $nom
 * @property string $prenom
 * @property string $adresse
 * @property string $fax
 * @property string $tel
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePersonne extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('personne');
        $this->hasColumn('id_personne', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('nom', 'string', 254, array(
             'type' => 'string',
             'length' => 254,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('prenom', 'string', 254, array(
             'type' => 'string',
             'length' => 254,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('adresse', 'string', 254, array(
             'type' => 'string',
             'length' => 254,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('fax', 'string', 254, array(
             'type' => 'string',
             'length' => 254,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('tel', 'string', 254, array(
             'type' => 'string',
             'length' => 254,
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
        
    }
}