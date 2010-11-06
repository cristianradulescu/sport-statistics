<?php

/**
 * Competition filter form.
 *
 * @package    filters
 * @subpackage Competition *
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class CompetitionFormFilter extends BaseCompetitionFormFilter
{
  /**
   * Display only active sport and countries
   */
  public function configure()
  {
    // show only enabled sports
    $query = Doctrine_Query::create()
      ->from('Sport s')
      ->where('s.active = ?', true);

    $this->getWidget('sport_id')->setOption('query', $query);

    // show only enabled countries
    $query = Doctrine_Query::create()
      ->from('Country c')
      ->where('c.active = ?', true);

    $this->getWidget('country_id')->setOption('query', $query);
  }
}