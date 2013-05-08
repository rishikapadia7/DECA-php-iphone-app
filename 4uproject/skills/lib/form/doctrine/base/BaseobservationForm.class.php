<?php

/**
 * observation form base class.
 *
 * @method observation getObject() Returns the current form's model object
 *
 * @package    skills
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseobservationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'comment'    => new sfWidgetFormTextarea(),
      'student_id' => new sfWidgetFormInputHidden(),
      'teacher_id' => new sfWidgetFormInputHidden(),
      'klass_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'comment'    => new sfValidatorString(),
      'student_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('student_id')), 'empty_value' => $this->getObject()->get('student_id'), 'required' => false)),
      'teacher_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('teacher_id')), 'empty_value' => $this->getObject()->get('teacher_id'), 'required' => false)),
      'klass_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('klass_id')), 'empty_value' => $this->getObject()->get('klass_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'observation';
  }

}
