<?php

/**
 * Baseklass
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $course_code
 * @property string $section
 * @property string $name
 * @property Doctrine_Collection $observations
 * @property Doctrine_Collection $student_has_klasses
 * 
 * @method integer             getId()                  Returns the current record's "id" value
 * @method string              getCourseCode()          Returns the current record's "course_code" value
 * @method string              getSection()             Returns the current record's "section" value
 * @method string              getName()                Returns the current record's "name" value
 * @method Doctrine_Collection getObservations()        Returns the current record's "observations" collection
 * @method Doctrine_Collection getStudentHasKlasses()   Returns the current record's "student_has_klasses" collection
 * @method klass               setId()                  Sets the current record's "id" value
 * @method klass               setCourseCode()          Sets the current record's "course_code" value
 * @method klass               setSection()             Sets the current record's "section" value
 * @method klass               setName()                Sets the current record's "name" value
 * @method klass               setObservations()        Sets the current record's "observations" collection
 * @method klass               setStudentHasKlasses()   Sets the current record's "student_has_klasses" collection
 * 
 * @package    skills
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class Baseklass extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('klass');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('course_code', 'string', 6, array(
             'type' => 'string',
             'length' => 6,
             ));
        $this->hasColumn('section', 'string', 1, array(
             'type' => 'string',
             'length' => 1,
             ));
        $this->hasColumn('name', 'string', 45, array(
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
             'foreign' => 'klass_id'));

        $this->hasMany('StudentKlass as student_has_klasses', array(
             'local' => 'id',
             'foreign' => 'klass_id'));
    }
}