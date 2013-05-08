<?php

/**
 * observation filter form base class.
 *
 * @package    skills
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseobservationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'comment'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'comment'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'observation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'comment'    => 'Text',
      'student_id' => 'Number',
      'teacher_id' => 'Number',
      'klass_id'   => 'Number',
    );
  }
}
