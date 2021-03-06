<?php

/**
 * BaseCompetition
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $country_id
 * @property integer $sport_id
 * @property string $competition
 * @property integer $table_id
 * @property integer $importance
 * @property boolean $active
 * @property timestamp $statistics_updated_at
 * @property timestamp $fixtures_updated_at
 * @property Country $Country
 * @property Sport $Sport
 * @property Doctrine_Collection $Statistics
 * @property Doctrine_Collection $Fixture
 * 
 * @method integer             getCountryId()             Returns the current record's "country_id" value
 * @method integer             getSportId()               Returns the current record's "sport_id" value
 * @method string              getCompetition()           Returns the current record's "competition" value
 * @method integer             getTableId()               Returns the current record's "table_id" value
 * @method integer             getImportance()            Returns the current record's "importance" value
 * @method boolean             getActive()                Returns the current record's "active" value
 * @method timestamp           getStatisticsUpdatedAt()   Returns the current record's "statistics_updated_at" value
 * @method timestamp           getFixturesUpdatedAt()     Returns the current record's "fixtures_updated_at" value
 * @method Country             getCountry()               Returns the current record's "Country" value
 * @method Sport               getSport()                 Returns the current record's "Sport" value
 * @method Doctrine_Collection getStatistics()            Returns the current record's "Statistics" collection
 * @method Doctrine_Collection getFixture()               Returns the current record's "Fixture" collection
 * @method Competition         setCountryId()             Sets the current record's "country_id" value
 * @method Competition         setSportId()               Sets the current record's "sport_id" value
 * @method Competition         setCompetition()           Sets the current record's "competition" value
 * @method Competition         setTableId()               Sets the current record's "table_id" value
 * @method Competition         setImportance()            Sets the current record's "importance" value
 * @method Competition         setActive()                Sets the current record's "active" value
 * @method Competition         setStatisticsUpdatedAt()   Sets the current record's "statistics_updated_at" value
 * @method Competition         setFixturesUpdatedAt()     Sets the current record's "fixtures_updated_at" value
 * @method Competition         setCountry()               Sets the current record's "Country" value
 * @method Competition         setSport()                 Sets the current record's "Sport" value
 * @method Competition         setStatistics()            Sets the current record's "Statistics" collection
 * @method Competition         setFixture()               Sets the current record's "Fixture" collection
 * 
 * @package    sport-statistics
 * @subpackage model
 * @author     Cristian Radulescu
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCompetition extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('competition');
        $this->hasColumn('country_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('sport_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('competition', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('table_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             ));
        $this->hasColumn('importance', 'integer', 3, array(
             'type' => 'integer',
             'default' => 1,
             'length' => 3,
             ));
        $this->hasColumn('active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             'notnull' => true,
             ));
        $this->hasColumn('statistics_updated_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('fixtures_updated_at', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Country', array(
             'local' => 'country_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Sport', array(
             'local' => 'sport_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Statistics', array(
             'local' => 'id',
             'foreign' => 'competition_id'));

        $this->hasMany('Fixture', array(
             'local' => 'id',
             'foreign' => 'competition_id'));
    }
}