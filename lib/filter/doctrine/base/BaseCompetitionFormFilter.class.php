<?php

/**
 * Competition filter form base class.
 *
 * @package    sport-statistics
 * @subpackage filter
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCompetitionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'country_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Country'), 'add_empty' => true)),
      'sport_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sport'), 'add_empty' => true)),
      'competition'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'table_id'              => new sfWidgetFormFilterInput(),
      'importance'            => new sfWidgetFormFilterInput(),
      'active'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'statistics_updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fixtures_updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'country_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Country'), 'column' => 'id')),
      'sport_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Sport'), 'column' => 'id')),
      'competition'           => new sfValidatorPass(array('required' => false)),
      'table_id'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'importance'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'active'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'statistics_updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'fixtures_updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('competition_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Competition';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'country_id'            => 'ForeignKey',
      'sport_id'              => 'ForeignKey',
      'competition'           => 'Text',
      'table_id'              => 'Number',
      'importance'            => 'Number',
      'active'                => 'Boolean',
      'statistics_updated_at' => 'Date',
      'fixtures_updated_at'   => 'Date',
    );
  }
}
