<?php

/**
 * ObservationSkill form base class.
 *
 * @method ObservationSkill getObject() Returns the current form's model object
 *
 * @package    skills
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseObservationSkillForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'observation_id'         => new sfWidgetFormInputHidden(),
      'observation_student_id' => new sfWidgetFormInputHidden(),
      'observation_teacher_id' => new sfWidgetFormInputHidden(),
      'observation_klass_id'   => new sfWidgetFormInputHidden(),
      'skill_id'               => new sfWidgetFormInputHidden(),
      'level_id'               => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'observation_id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('observation_id')), 'empty_value' => $this->getObject()->get('observation_id'), 'required' => false)),
      'observation_student_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('observation_student_id')), 'empty_value' => $this->getObject()->get('observation_student_id'), 'required' => false)),
      'observation_teacher_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('observation_teacher_id')), 'empty_value' => $this->getObject()->get('observation_teacher_id'), 'required' => false)),
      'observation_klass_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('observation_klass_id')), 'empty_value' => $this->getObject()->get('observation_klass_id'), 'required' => false)),
      'skill_id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('skill_id')), 'empty_value' => $this->getObject()->get('skill_id'), 'required' => false)),
      'level_id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('level_id')), 'empty_value' => $this->getObject()->get('level_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('observation_skill[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationSkill';
  }

}
