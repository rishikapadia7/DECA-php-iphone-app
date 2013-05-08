<?php

/**
 * ObservationSkill filter form base class.
 *
 * @package    skills
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseObservationSkillFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('observation_skill_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ObservationSkill';
  }

  public function getFields()
  {
    return array(
      'observation_id'         => 'Number',
      'observation_student_id' => 'Number',
      'observation_teacher_id' => 'Number',
      'observation_klass_id'   => 'Number',
      'skill_id'               => 'Number',
      'level_id'               => 'Number',
    );
  }
}
