<?php

/**
 * BaseStatistics
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $competition_id
 * @property integer $position
 * @property string $team
 * @property integer $total_games_played
 * @property integer $total_games_won
 * @property integer $total_games_won_overtime
 * @property integer $total_games_won_afterpenalty
 * @property integer $total_games_draw
 * @property integer $total_games_lost
 * @property integer $total_games_lost_overtime
 * @property integer $total_games_lost_afterpenalty
 * @property string $total_goals
 * @property integer $goal_diff
 * @property string $total_game_points_for
 * @property integer $total_points
 * @property integer $home_games_played
 * @property integer $home_games_won
 * @property integer $home_games_won_overtime
 * @property integer $home_games_won_afterpenalty
 * @property integer $home_games_draw
 * @property integer $home_games_lost
 * @property integer $home_games_lost_overtime
 * @property integer $home_games_lost_afterpenalty
 * @property string $home_goals
 * @property string $home_game_points_for
 * @property integer $home_points
 * @property integer $away_games_played
 * @property integer $away_games_won
 * @property integer $away_games_won_overtime
 * @property integer $away_games_won_afterpenalty
 * @property integer $away_games_draw
 * @property integer $away_games_lost
 * @property integer $away_games_lost_overtime
 * @property integer $away_games_lost_afterpenalty
 * @property string $away_goals
 * @property string $away_game_points_for
 * @property integer $away_points
 * @property integer $over
 * @property integer $under
 * @property Competition $Competition
 * 
 * @method integer     getCompetitionId()                 Returns the current record's "competition_id" value
 * @method integer     getPosition()                      Returns the current record's "position" value
 * @method string      getTeam()                          Returns the current record's "team" value
 * @method integer     getTotalGamesPlayed()              Returns the current record's "total_games_played" value
 * @method integer     getTotalGamesWon()                 Returns the current record's "total_games_won" value
 * @method integer     getTotalGamesWonOvertime()         Returns the current record's "total_games_won_overtime" value
 * @method integer     getTotalGamesWonAfterpenalty()     Returns the current record's "total_games_won_afterpenalty" value
 * @method integer     getTotalGamesDraw()                Returns the current record's "total_games_draw" value
 * @method integer     getTotalGamesLost()                Returns the current record's "total_games_lost" value
 * @method integer     getTotalGamesLostOvertime()        Returns the current record's "total_games_lost_overtime" value
 * @method integer     getTotalGamesLostAfterpenalty()    Returns the current record's "total_games_lost_afterpenalty" value
 * @method string      getTotalGoals()                    Returns the current record's "total_goals" value
 * @method integer     getGoalDiff()                      Returns the current record's "goal_diff" value
 * @method string      getTotalGamePointsFor()            Returns the current record's "total_game_points_for" value
 * @method integer     getTotalPoints()                   Returns the current record's "total_points" value
 * @method integer     getHomeGamesPlayed()               Returns the current record's "home_games_played" value
 * @method integer     getHomeGamesWon()                  Returns the current record's "home_games_won" value
 * @method integer     getHomeGamesWonOvertime()          Returns the current record's "home_games_won_overtime" value
 * @method integer     getHomeGamesWonAfterpenalty()      Returns the current record's "home_games_won_afterpenalty" value
 * @method integer     getHomeGamesDraw()                 Returns the current record's "home_games_draw" value
 * @method integer     getHomeGamesLost()                 Returns the current record's "home_games_lost" value
 * @method integer     getHomeGamesLostOvertime()         Returns the current record's "home_games_lost_overtime" value
 * @method integer     getHomeGamesLostAfterpenalty()     Returns the current record's "home_games_lost_afterpenalty" value
 * @method string      getHomeGoals()                     Returns the current record's "home_goals" value
 * @method string      getHomeGamePointsFor()             Returns the current record's "home_game_points_for" value
 * @method integer     getHomePoints()                    Returns the current record's "home_points" value
 * @method integer     getAwayGamesPlayed()               Returns the current record's "away_games_played" value
 * @method integer     getAwayGamesWon()                  Returns the current record's "away_games_won" value
 * @method integer     getAwayGamesWonOvertime()          Returns the current record's "away_games_won_overtime" value
 * @method integer     getAwayGamesWonAfterpenalty()      Returns the current record's "away_games_won_afterpenalty" value
 * @method integer     getAwayGamesDraw()                 Returns the current record's "away_games_draw" value
 * @method integer     getAwayGamesLost()                 Returns the current record's "away_games_lost" value
 * @method integer     getAwayGamesLostOvertime()         Returns the current record's "away_games_lost_overtime" value
 * @method integer     getAwayGamesLostAfterpenalty()     Returns the current record's "away_games_lost_afterpenalty" value
 * @method string      getAwayGoals()                     Returns the current record's "away_goals" value
 * @method string      getAwayGamePointsFor()             Returns the current record's "away_game_points_for" value
 * @method integer     getAwayPoints()                    Returns the current record's "away_points" value
 * @method integer     getOver()                          Returns the current record's "over" value
 * @method integer     getUnder()                         Returns the current record's "under" value
 * @method Competition getCompetition()                   Returns the current record's "Competition" value
 * @method Statistics  setCompetitionId()                 Sets the current record's "competition_id" value
 * @method Statistics  setPosition()                      Sets the current record's "position" value
 * @method Statistics  setTeam()                          Sets the current record's "team" value
 * @method Statistics  setTotalGamesPlayed()              Sets the current record's "total_games_played" value
 * @method Statistics  setTotalGamesWon()                 Sets the current record's "total_games_won" value
 * @method Statistics  setTotalGamesWonOvertime()         Sets the current record's "total_games_won_overtime" value
 * @method Statistics  setTotalGamesWonAfterpenalty()     Sets the current record's "total_games_won_afterpenalty" value
 * @method Statistics  setTotalGamesDraw()                Sets the current record's "total_games_draw" value
 * @method Statistics  setTotalGamesLost()                Sets the current record's "total_games_lost" value
 * @method Statistics  setTotalGamesLostOvertime()        Sets the current record's "total_games_lost_overtime" value
 * @method Statistics  setTotalGamesLostAfterpenalty()    Sets the current record's "total_games_lost_afterpenalty" value
 * @method Statistics  setTotalGoals()                    Sets the current record's "total_goals" value
 * @method Statistics  setGoalDiff()                      Sets the current record's "goal_diff" value
 * @method Statistics  setTotalGamePointsFor()            Sets the current record's "total_game_points_for" value
 * @method Statistics  setTotalPoints()                   Sets the current record's "total_points" value
 * @method Statistics  setHomeGamesPlayed()               Sets the current record's "home_games_played" value
 * @method Statistics  setHomeGamesWon()                  Sets the current record's "home_games_won" value
 * @method Statistics  setHomeGamesWonOvertime()          Sets the current record's "home_games_won_overtime" value
 * @method Statistics  setHomeGamesWonAfterpenalty()      Sets the current record's "home_games_won_afterpenalty" value
 * @method Statistics  setHomeGamesDraw()                 Sets the current record's "home_games_draw" value
 * @method Statistics  setHomeGamesLost()                 Sets the current record's "home_games_lost" value
 * @method Statistics  setHomeGamesLostOvertime()         Sets the current record's "home_games_lost_overtime" value
 * @method Statistics  setHomeGamesLostAfterpenalty()     Sets the current record's "home_games_lost_afterpenalty" value
 * @method Statistics  setHomeGoals()                     Sets the current record's "home_goals" value
 * @method Statistics  setHomeGamePointsFor()             Sets the current record's "home_game_points_for" value
 * @method Statistics  setHomePoints()                    Sets the current record's "home_points" value
 * @method Statistics  setAwayGamesPlayed()               Sets the current record's "away_games_played" value
 * @method Statistics  setAwayGamesWon()                  Sets the current record's "away_games_won" value
 * @method Statistics  setAwayGamesWonOvertime()          Sets the current record's "away_games_won_overtime" value
 * @method Statistics  setAwayGamesWonAfterpenalty()      Sets the current record's "away_games_won_afterpenalty" value
 * @method Statistics  setAwayGamesDraw()                 Sets the current record's "away_games_draw" value
 * @method Statistics  setAwayGamesLost()                 Sets the current record's "away_games_lost" value
 * @method Statistics  setAwayGamesLostOvertime()         Sets the current record's "away_games_lost_overtime" value
 * @method Statistics  setAwayGamesLostAfterpenalty()     Sets the current record's "away_games_lost_afterpenalty" value
 * @method Statistics  setAwayGoals()                     Sets the current record's "away_goals" value
 * @method Statistics  setAwayGamePointsFor()             Sets the current record's "away_game_points_for" value
 * @method Statistics  setAwayPoints()                    Sets the current record's "away_points" value
 * @method Statistics  setOver()                          Sets the current record's "over" value
 * @method Statistics  setUnder()                         Sets the current record's "under" value
 * @method Statistics  setCompetition()                   Sets the current record's "Competition" value
 * 
 * @package    sport-statistics
 * @subpackage model
 * @author     Cristian Radulescu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStatistics extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('statistics');
        $this->hasColumn('competition_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('position', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('team', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('total_games_played', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_games_won', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_games_won_overtime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_games_won_afterpenalty', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_games_draw', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_games_lost', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_games_lost_overtime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_games_lost_afterpenalty', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_goals', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('goal_diff', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('total_game_points_for', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('total_points', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_played', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_won', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_won_overtime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_won_afterpenalty', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_draw', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_lost', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_lost_overtime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_games_lost_afterpenalty', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('home_goals', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('home_game_points_for', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('home_points', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_played', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_won', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_won_overtime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_won_afterpenalty', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_draw', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_lost', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_lost_overtime', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_games_lost_afterpenalty', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('away_goals', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('away_game_points_for', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('away_points', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('over', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('under', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Competition', array(
             'local' => 'competition_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}