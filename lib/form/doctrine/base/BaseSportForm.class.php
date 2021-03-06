<?php

/**
 * Sport form base class.
 *
 * @method Sport getObject() Returns the current form's model object
 *
 * @package    sport-statistics
 * @subpackage form
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSportForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'sport'  => new sfWidgetFormInputText(),
      'active' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sport'  => new sfValidatorString(array('max_length' => 255)),
      'active' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sport[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sport';
  }

}
