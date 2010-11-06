<?php

/**
 * Competition form base class.
 *
 * @method Competition getObject() Returns the current form's model object
 *
 * @package    sport-statistics
 * @subpackage form
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCompetitionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'country_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => false)),
      'sport_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sport'), 'add_empty' => false)),
      'competition'           => new sfWidgetFormInputText(),
      'table_id'              => new sfWidgetFormInputText(),
      'importance'            => new sfWidgetFormInputText(),
      'active'                => new sfWidgetFormInputCheckbox(),
      'statistics_updated_at' => new sfWidgetFormDateTime(),
      'fixtures_updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'country_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Country'))),
      'sport_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sport'))),
      'competition'           => new sfValidatorString(array('max_length' => 255)),
      'table_id'              => new sfValidatorInteger(array('required' => false)),
      'importance'            => new sfValidatorInteger(array('required' => false)),
      'active'                => new sfValidatorBoolean(array('required' => false)),
      'statistics_updated_at' => new sfValidatorDateTime(array('required' => false)),
      'fixtures_updated_at'   => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('competition[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Competition';
  }

}
