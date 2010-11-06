<?php

/**
 * competition actions.
 *
 * @package    sport-statistics
 * @subpackage competition
 * @author     Cristian Radulescu
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class competitionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->getUser()->setCulture('ro_RO');

    // create sports list and widget
    $sports = Doctrine::getTable('Sport')
      ->createQuery('s')
      ->where('active = ', 1)
      ->execute();

    $sport_choices[''] = $this->context->getI18n()->__('Select sport');
    foreach ($sports as $sport)
    {
      $sport_choices[$sport->getId()] = $this->context->getI18n()->__($sport->getSport());
    }
    $this->sport_form = new sfWidgetFormChoice(array('choices' => $sport_choices, 'label' => 'Sports'));

    $this->executeGetCompetitionsList($request);
  }

  /**
   * Get the compettions list
   *
   * @return string
   */
  public function executeGetCompetitionsList(sfWebRequest $request)
  {
    $sport_id = $request->getParameter('sport_id');

    // create competitions list and widget
    $competitions = Doctrine::getTable('Competition')
      ->createQuery('c')
      ->where('active = ?', 1)
      ->andWhere('sport_id = ?', $sport_id)
      ->leftJoin('c.Country t')
      ->addOrderBy('importance')
      ->execute();

    $unsorted_competitions = array();
    $unsorted_countries = array();
    foreach ($competitions as $competition)
    {
      if ($competition->getCountry()->isInternational() && $competition->getSportId() == Sport::SOCCER)
      {
        $country_data = explode(' - ', $competition->getCompetition());
        $country = $this->context->getI18n()->__($country_data[0]);
        $competition_data = explode(' - ', $competition->getCompetition());
        $competition_name = $this->context->getI18n()->__($competition_data[1]);
      }
      else
      {
        $country = $this->context->getI18n()->__((string) $competition->getCountry());
        $competition_name = $this->context->getI18n()->__((string) $competition->getCompetition());
      }
      $unsorted_countries[] = $country;
      $unsorted_competitions[$country][$competition->getId()] = $country.' - '.$competition_name;
    }

    sort($unsorted_countries, SORT_STRING);

    $competition_choices[''] = $this->context->getI18n()->__('Select competition');

    foreach ($unsorted_countries as $country)
    {
      $competition_choices[$country] = $unsorted_competitions[$country];
    }

    $this->competition_form = new sfWidgetFormChoice(array('choices' => $competition_choices, 'label' => 'Competitions'));

    // if this is an ajax call with post render text
    if ($request->isXmlHttpRequest())
    {
      return $this->renderText($this->competition_form->render('statistics[competition]'));
    }
  }

  /**
   * Get the statistics data
   *
   * @param sfWebRequest $request
   * @return string
   */
  public function executeGetStatistics(sfWebRequest $request)
  {
    $competition_id = $request->getParameter('competition_id');

    // trigger ajax call if not empty competition id
    if (!$competition_id)
    {
      return $this->renderText('');
    }

    // get competition data
    $competition = Doctrine::getTable('Competition')->find($competition_id);
    $statistics = $competition->getNotNullStatistics();

    // if no statistics found display error message
    if (empty($statistics))
    {
      return $this->renderText('Missing data');
    }

    // get columns using first row from the extrated tables
    $columns = array_keys($statistics[0]);

    // column groups
    $groups = sfConfig::get('app_tables_groups', array());
    $template_groups = array();

    // remove empty columns for groups array
    foreach ($groups as $group_name => $group_data)
    {
      foreach ($group_data['columns'] as $column => $column_data)
      {
        if (in_array($column, $columns))
        {
          $template_groups[$group_name]['columns'][$column] = $column_data;
        }
      }

      // if there are columns in this group also set it's label
      if (isset($template_groups[$group_name]))
      {
         // set group label to display
        $template_groups[$group_name]['label'] = $group_data['label'];
      }
    }

    // if competition is from soccer sport also display fixtures
    $fixtures = array();
    $fixtures_data = array();
//    if ($competition->getSportId() == Sport::SOCCER)
//    {
    $fixtures = Doctrine::getTable('fixture')
                ->findBy('competition_id', $competition_id);

    foreach ($fixtures as $fixture)
    {
      if (array_key_exists($fixture->getRound(), $fixtures_data))
      {
        array_push($fixtures_data[$fixture->getRound()], $fixture);
      }
      else
      {
        $fixtures_data[$fixture->getRound()] = array($fixture);
      }
    }

    // if there are 3 rounds found, reduce them to 2
    if (count($fixtures_data) == 3)
    {
      if (key($fixtures_data) != 1)
      {
        $fixtures_data = array_reverse($fixtures_data, true);
        array_pop($fixtures_data);
        $fixtures_data = array_reverse($fixtures_data, true);
      }
      else
      {
        array_pop($fixtures_data);
      }
    }
//    }

    return $this->renderPartial('statistics', array('groups' => $template_groups, 'values' => $statistics, 'competition' => $competition, 'fixtures' => $fixtures_data));
  }

  /**
   * Get the statistics data
   *
   * @param sfWebRequest $request
   * @return string
   */
  public function executeListTextCompetitions(sfWebRequest $request)
  {
    // create competitions list
    $competitions = Doctrine::getTable('Competition')
      ->createQuery('c')
      ->where('active = ?', 1)
      ->leftJoin('c.Country t')
      ->leftJoin('c.Sport s')
      ->addWhere('s.active = ?', 1)
      ->addOrderBy('t.country')
      ->addOrderBy('importance')
      ->execute();

    $competitions_list_text = array();

    foreach ($competitions as $competition)
    {
      $competitions_list_text[(string)$competition->getSport()][$competition->getId()] = $this->context->getI18n()->__($competition->getCountry()).' - '.$this->context->getI18n()->__($competition->getCompetition());
    }

    $this->competitions_list_text = $competitions_list_text;
  }
}