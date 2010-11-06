<?php

/**
 * Statistics form base class.
 *
 * @method Statistics getObject() Returns the current form's model object
 *
 * @package    sport-statistics
 * @subpackage form
 * @author     Cristian Radulescu
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseStatisticsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                            => new sfWidgetFormInputHidden(),
      'competition_id'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'), 'add_empty' => false)),
      'position'                      => new sfWidgetFormInputText(),
      'team'                          => new sfWidgetFormInputText(),
      'total_games_played'            => new sfWidgetFormInputText(),
      'total_games_won'               => new sfWidgetFormInputText(),
      'total_games_won_overtime'      => new sfWidgetFormInputText(),
      'total_games_won_afterpenalty'  => new sfWidgetFormInputText(),
      'total_games_draw'              => new sfWidgetFormInputText(),
      'total_games_lost'              => new sfWidgetFormInputText(),
      'total_games_lost_overtime'     => new sfWidgetFormInputText(),
      'total_games_lost_afterpenalty' => new sfWidgetFormInputText(),
      'total_goals'                   => new sfWidgetFormInputText(),
      'goal_diff'                     => new sfWidgetFormInputText(),
      'total_game_points_for'         => new sfWidgetFormInputText(),
      'total_points'                  => new sfWidgetFormInputText(),
      'home_games_played'             => new sfWidgetFormInputText(),
      'home_games_won'                => new sfWidgetFormInputText(),
      'home_games_won_overtime'       => new sfWidgetFormInputText(),
      'home_games_won_afterpenalty'   => new sfWidgetFormInputText(),
      'home_games_draw'               => new sfWidgetFormInputText(),
      'home_games_lost'               => new sfWidgetFormInputText(),
      'home_games_lost_overtime'      => new sfWidgetFormInputText(),
      'home_games_lost_afterpenalty'  => new sfWidgetFormInputText(),
      'home_goals'                    => new sfWidgetFormInputText(),
      'home_game_points_for'          => new sfWidgetFormInputText(),
      'home_points'                   => new sfWidgetFormInputText(),
      'away_games_played'             => new sfWidgetFormInputText(),
      'away_games_won'                => new sfWidgetFormInputText(),
      'away_games_won_overtime'       => new sfWidgetFormInputText(),
      'away_games_won_afterpenalty'   => new sfWidgetFormInputText(),
      'away_games_draw'               => new sfWidgetFormInputText(),
      'away_games_lost'               => new sfWidgetFormInputText(),
      'away_games_lost_overtime'      => new sfWidgetFormInputText(),
      'away_games_lost_afterpenalty'  => new sfWidgetFormInputText(),
      'away_goals'                    => new sfWidgetFormInputText(),
      'away_game_points_for'          => new sfWidgetFormInputText(),
      'away_points'                   => new sfWidgetFormInputText(),
      'over'                          => new sfWidgetFormInputText(),
      'under'                         => new sfWidgetFormInputText(),
      'created_at'                    => new sfWidgetFormDateTime(),
      'updated_at'                    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'competition_id'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Competition'))),
      'position'                      => new sfValidatorInteger(),
      'team'                          => new sfValidatorString(array('max_length' => 255)),
      'total_games_played'            => new sfValidatorInteger(array('required' => false)),
      'total_games_won'               => new sfValidatorInteger(array('required' => false)),
      'total_games_won_overtime'      => new sfValidatorInteger(array('required' => false)),
      'total_games_won_afterpenalty'  => new sfValidatorInteger(array('required' => false)),
      'total_games_draw'              => new sfValidatorInteger(array('required' => false)),
      'total_games_lost'              => new sfValidatorInteger(array('required' => false)),
      'total_games_lost_overtime'     => new sfValidatorInteger(array('required' => false)),
      'total_games_lost_afterpenalty' => new sfValidatorInteger(array('required' => false)),
      'total_goals'                   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'goal_diff'                     => new sfValidatorInteger(array('required' => false)),
      'total_game_points_for'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'total_points'                  => new sfValidatorInteger(array('required' => false)),
      'home_games_played'             => new sfValidatorInteger(array('required' => false)),
      'home_games_won'                => new sfValidatorInteger(array('required' => false)),
      'home_games_won_overtime'       => new sfValidatorInteger(array('required' => false)),
      'home_games_won_afterpenalty'   => new sfValidatorInteger(array('required' => false)),
      'home_games_draw'               => new sfValidatorInteger(array('required' => false)),
      'home_games_lost'               => new sfValidatorInteger(array('required' => false)),
      'home_games_lost_overtime'      => new sfValidatorInteger(array('required' => false)),
      'home_games_lost_afterpenalty'  => new sfValidatorInteger(array('required' => false)),
      'home_goals'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'home_game_points_for'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'home_points'                   => new sfValidatorInteger(array('required' => false)),
      'away_games_played'             => new sfValidatorInteger(array('required' => false)),
      'away_games_won'                => new sfValidatorInteger(array('required' => false)),
      'away_games_won_overtime'       => new sfValidatorInteger(array('required' => false)),
      'away_games_won_afterpenalty'   => new sfValidatorInteger(array('required' => false)),
      'away_games_draw'               => new sfValidatorInteger(array('required' => false)),
      'away_games_lost'               => new sfValidatorInteger(array('required' => false)),
      'away_games_lost_overtime'      => new sfValidatorInteger(array('required' => false)),
      'away_games_lost_afterpenalty'  => new sfValidatorInteger(array('required' => false)),
      'away_goals'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'away_game_points_for'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'away_points'                   => new sfValidatorInteger(array('required' => false)),
      'over'                          => new sfValidatorInteger(array('required' => false)),
      'under'                         => new sfValidatorInteger(array('required' => false)),
      'created_at'                    => new sfValidatorDateTime(),
      'updated_at'                    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('statistics[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Statistics';
  }

}
