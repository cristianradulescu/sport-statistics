<?php

/**
 * Sport filter form base class.
 *
 * @package    sport-statistics
 * @subpackage filter
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSportFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sport'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'active' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'sport'  => new sfValidatorPass(array('required' => false)),
      'active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sport_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sport';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'sport'  => 'Text',
      'active' => 'Boolean',
    );
  }
}
