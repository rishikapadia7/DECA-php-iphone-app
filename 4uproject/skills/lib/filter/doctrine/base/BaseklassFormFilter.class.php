<?php

/**
 * klass filter form base class.
 *
 * @package    skills
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseklassFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'course_code' => new sfWidgetFormFilterInput(),
      'section'     => new sfWidgetFormFilterInput(),
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'course_code' => new sfValidatorPass(array('required' => false)),
      'section'     => new sfValidatorPass(array('required' => false)),
      'name'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('klass_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'klass';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'course_code' => 'Text',
      'section'     => 'Text',
      'name'        => 'Text',
    );
  }
}
