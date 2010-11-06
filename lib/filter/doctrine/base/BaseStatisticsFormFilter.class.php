<?php

/**
 * Statistics filter form base class.
 *
 * @package    sport-statistics
 * @subpackage filter
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseStatisticsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'competition_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'), 'add_empty' => true)),
      'position'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'team'                          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'total_games_played'            => new sfWidgetFormFilterInput(),
      'total_games_won'               => new sfWidgetFormFilterInput(),
      'total_games_won_overtime'      => new sfWidgetFormFilterInput(),
      'total_games_won_afterpenalty'  => new sfWidgetFormFilterInput(),
      'total_games_draw'              => new sfWidgetFormFilterInput(),
      'total_games_lost'              => new sfWidgetFormFilterInput(),
      'total_games_lost_overtime'     => new sfWidgetFormFilterInput(),
      'total_games_lost_afterpenalty' => new sfWidgetFormFilterInput(),
      'total_goals'                   => new sfWidgetFormFilterInput(),
      'goal_diff'                     => new sfWidgetFormFilterInput(),
      'total_game_points_for'         => new sfWidgetFormFilterInput(),
      'total_points'                  => new sfWidgetFormFilterInput(),
      'home_games_played'             => new sfWidgetFormFilterInput(),
      'home_games_won'                => new sfWidgetFormFilterInput(),
      'home_games_won_overtime'       => new sfWidgetFormFilterInput(),
      'home_games_won_afterpenalty'   => new sfWidgetFormFilterInput(),
      'home_games_draw'               => new sfWidgetFormFilterInput(),
      'home_games_lost'               => new sfWidgetFormFilterInput(),
      'home_games_lost_overtime'      => new sfWidgetFormFilterInput(),
      'home_games_lost_afterpenalty'  => new sfWidgetFormFilterInput(),
      'home_goals'                    => new sfWidgetFormFilterInput(),
      'home_game_points_for'          => new sfWidgetFormFilterInput(),
      'home_points'                   => new sfWidgetFormFilterInput(),
      'away_games_played'             => new sfWidgetFormFilterInput(),
      'away_games_won'                => new sfWidgetFormFilterInput(),
      'away_games_won_overtime'       => new sfWidgetFormFilterInput(),
      'away_games_won_afterpenalty'   => new sfWidgetFormFilterInput(),
      'away_games_draw'               => new sfWidgetFormFilterInput(),
      'away_games_lost'               => new sfWidgetFormFilterInput(),
      'away_games_lost_overtime'      => new sfWidgetFormFilterInput(),
      'away_games_lost_afterpenalty'  => new sfWidgetFormFilterInput(),
      'away_goals'                    => new sfWidgetFormFilterInput(),
      'away_game_points_for'          => new sfWidgetFormFilterInput(),
      'away_points'                   => new sfWidgetFormFilterInput(),
      'over'                          => new sfWidgetFormFilterInput(),
      'under'                         => new sfWidgetFormFilterInput(),
      'created_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'competition_id'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Competition'), 'column' => 'id')),
      'position'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'team'                          => new sfValidatorPass(array('required' => false)),
      'total_games_played'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_games_won'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_games_won_overtime'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_games_won_afterpenalty'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_games_draw'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_games_lost'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_games_lost_overtime'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_games_lost_afterpenalty' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_goals'                   => new sfValidatorPass(array('required' => false)),
      'goal_diff'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'total_game_points_for'         => new sfValidatorPass(array('required' => false)),
      'total_points'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_played'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_won'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_won_overtime'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_won_afterpenalty'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_draw'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_lost'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_lost_overtime'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_games_lost_afterpenalty'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'home_goals'                    => new sfValidatorPass(array('required' => false)),
      'home_game_points_for'          => new sfValidatorPass(array('required' => false)),
      'home_points'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_played'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_won'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_won_overtime'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_won_afterpenalty'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_draw'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_lost'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_lost_overtime'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_games_lost_afterpenalty'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'away_goals'                    => new sfValidatorPass(array('required' => false)),
      'away_game_points_for'          => new sfValidatorPass(array('required' => false)),
      'away_points'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'over'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'under'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('statistics_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Statistics';
  }

  public function getFields()
  {
    return array(
      'id'                            => 'Number',
      'competition_id'                => 'ForeignKey',
      'position'                      => 'Number',
      'team'                          => 'Text',
      'total_games_played'            => 'Number',
      'total_games_won'               => 'Number',
      'total_games_won_overtime'      => 'Number',
      'total_games_won_afterpenalty'  => 'Number',
      'total_games_draw'              => 'Number',
      'total_games_lost'              => 'Number',
      'total_games_lost_overtime'     => 'Number',
      'total_games_lost_afterpenalty' => 'Number',
      'total_goals'                   => 'Text',
      'goal_diff'                     => 'Number',
      'total_game_points_for'         => 'Text',
      'total_points'                  => 'Number',
      'home_games_played'             => 'Number',
      'home_games_won'                => 'Number',
      'home_games_won_overtime'       => 'Number',
      'home_games_won_afterpenalty'   => 'Number',
      'home_games_draw'               => 'Number',
      'home_games_lost'               => 'Number',
      'home_games_lost_overtime'      => 'Number',
      'home_games_lost_afterpenalty'  => 'Number',
      'home_goals'                    => 'Text',
      'home_game_points_for'          => 'Text',
      'home_points'                   => 'Number',
      'away_games_played'             => 'Number',
      'away_games_won'                => 'Number',
      'away_games_won_overtime'       => 'Number',
      'away_games_won_afterpenalty'   => 'Number',
      'away_games_draw'               => 'Number',
      'away_games_lost'               => 'Number',
      'away_games_lost_overtime'      => 'Number',
      'away_games_lost_afterpenalty'  => 'Number',
      'away_goals'                    => 'Text',
      'away_game_points_for'          => 'Text',
      'away_points'                   => 'Number',
      'over'                          => 'Number',
      'under'                         => 'Number',
      'created_at'                    => 'Date',
      'updated_at'                    => 'Date',
    );
  }
}
