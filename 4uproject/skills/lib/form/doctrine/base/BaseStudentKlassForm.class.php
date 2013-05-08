<?php

/**
 * StudentKlass form base class.
 *
 * @method StudentKlass getObject() Returns the current form's model object
 *
 * @package    skills
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStudentKlassForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'student_id' => new sfWidgetFormInputHidden(),
      'klass_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'student_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('student_id')), 'empty_value' => $this->getObject()->get('student_id'), 'required' => false)),
      'klass_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('klass_id')), 'empty_value' => $this->getObject()->get('klass_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('student_klass[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StudentKlass';
  }

}
