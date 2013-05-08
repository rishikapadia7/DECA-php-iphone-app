<?php

/**
 * Baseteacher
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property Doctrine_Collection $observations
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getUsername()     Returns the current record's "username" value
 * @method string              getFirstName()    Returns the current record's "first_name" value
 * @method string              getLastName()     Returns the current record's "last_name" value
 * @method string              getPassword()     Returns the current record's "password" value
 * @method Doctrine_Collection getObservations() Returns the current record's "observations" collection
 * @method teacher             setId()           Sets the current record's "id" value
 * @method teacher             setUsername()     Sets the current record's "username" value
 * @method teacher             setFirstName()    Sets the current record's "first_name" value
 * @method teacher             setLastName()     Sets the current record's "last_name" value
 * @method teacher             setPassword()     Sets the current record's "password" value
 * @method teacher             setObservations() Sets the current record's "observations" collection
 * 
 * @package    skills
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseteacher extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('teacher');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('username', 'string', 45, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 45,
             ));
        $this->hasColumn('first_name', 'string', 45, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 45,
             ));
        $this->hasColumn('last_name', 'string', 45, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 45,
             ));
        $this->hasColumn('password', 'string', 45, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 45,
             ));

        $this->option('collate', 'latin1_swedish_ci');
        $this->option('charset', 'latin1');
        $this->option('type', 'InnoDB');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('observation as observations', array(
             'local' => 'id',
             'foreign' => 'teacher_id'));
    }
}