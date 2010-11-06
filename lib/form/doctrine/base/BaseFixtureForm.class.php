<?php

/**
 * Fixture form base class.
 *
 * @method Fixture getObject() Returns the current form's model object
 *
 * @package    sport-statistics
 * @subpackage form
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFixtureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'competition_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'), 'add_empty' => false)),
      'round'          => new sfWidgetFormInputText(),
      'game'           => new sfWidgetFormInputText(),
      'final_time'     => new sfWidgetFormInputText(),
      'half_time'      => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'competition_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'))),
      'round'          => new sfValidatorInteger(),
      'game'           => new sfValidatorString(array('max_length' => 255)),
      'final_time'     => new sfValidatorString(array('max_length' => 255)),
      'half_time'      => new sfValidatorString(array('max_length' => 255)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('fixture[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fixture';
  }

}
