<?php

/**
 * klass form base class.
 *
 * @method klass getObject() Returns the current form's model object
 *
 * @package    skills
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseklassForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'course_code' => new sfWidgetFormInputText(),
      'section'     => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'course_code' => new sfValidatorString(array('max_length' => 6, 'required' => false)),
      'section'     => new sfValidatorString(array('max_length' => 1, 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('klass[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'klass';
  }

}
