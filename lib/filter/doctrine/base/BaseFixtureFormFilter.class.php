<?php

/**
 * Fixture filter form base class.
 *
 * @package    sport-statistics
 * @subpackage filter
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFixtureFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'competition_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'), 'add_empty' => true)),
      'round'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'game'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'final_time'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'half_time'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'competition_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Competition'), 'column' => 'id')),
      'round'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'game'           => new sfValidatorPass(array('required' => false)),
      'final_time'     => new sfValidatorPass(array('required' => false)),
      'half_time'      => new sfValidatorPass(array('required' => false)),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('fixture_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fixture';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'competition_id' => 'ForeignKey',
      'round'          => 'Number',
      'game'           => 'Text',
      'final_time'     => 'Text',
      'half_time'      => 'Text',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
