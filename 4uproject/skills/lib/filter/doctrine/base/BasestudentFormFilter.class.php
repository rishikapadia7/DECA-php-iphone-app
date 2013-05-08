<?php

/**
 * student filter form base class.
 *
 * @package    skills
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasestudentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id' => new sfWidgetFormFilterInput(),
      'first_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'last_name'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'student_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'first_name' => new sfValidatorPass(array('required' => false)),
      'last_name'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'student';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'student_id' => 'Number',
      'first_name' => 'Text',
      'last_name'  => 'Text',
    );
  }
}
