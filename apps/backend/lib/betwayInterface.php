<?php

/**
 * Betway interface
 *
 * @package    sport-statistics
 * @subpackage competition
 * @author     Cristian Radulescu
 */
class betwayInterface
{
  private $competition;
  private $country;
  private $sport;
  private $url;
  private $query_strings;
  private static $totals = false;

  /**
   * The constructor
   * @param int $competition_id
   */
  public function __construct($competition_id)
  {
    try
    {
      $this->setCompetition($competition_id);
      $this->setCountry();
      $this->setSport();
      $this->setUrl();
      $this->setLanguage();
      $this->setQueryStrings();
    }
    catch (Exception $e)
    {
      throw $e;
    }
  }

  /**
   * Set competition based on received competition_id
   * @param int $competition_id
   */
  private function setCompetition($competition_id)
  {
    $this->competition = Doctrine::getTable("Competition")->find($competition_id);
  }

  /**
   * Set country based on competition
   */
  private function setCountry()
  {
    $this->country = $this->competition->getCountry();
  }

  /**
   * Set sport based on category
   */
  private function setSport()
  {
    $this->sport = $this->competition->getSport();
  }

  /**
   * Set main url
   */
  private function setUrl()
  {
     // get url from config
     $this->url = sfConfig::get('app_betway_url');
  }

  /**
   * Set query string
   */
  private function setLanguage()
  {
     // get query_string from config
     $this->language = sfConfig::get('app_betway_language');
  }

  /**
   * Set query string
   */
  private function setQueryStrings()
  {
     // get query_string from config
     $this->query_strings = sfConfig::get('app_betway_query_strings');
  }

  /**
   * Extract tables
   *
   * @return void
   */
  public function extractTables()
  {
    try
    {
      $rows = array();
      $rows_counter = 0;

      // build url
      $url = $this->url.'?page='.$this->query_strings['tables']['page'];
      $url .= '&showtype='.$this->query_strings['tables']['showtype'];
      $url .= '&tabletype='.$this->query_strings['tables']['tabletype'];
      $url .= '&print='.$this->query_strings['tables']['print'];
      $url .= '&language='.$this->language;
      $url .= '&tableid='.$this->competition->getTableId();

      // get html page content as SimpleXML object
      $xml = competitionGeneratorHelper::retrieveHtml($url);

      $parser_css_classes = sfConfig::get('app_betway_parser_css_classes', array());
      $table_rows = $xml->xpath(sfConfig::get('app_betway_xpath_table'));

      // populate league table object with the extracted data
      foreach ($table_rows as $row)
      {
        $cells = $row->children();
        $row_data = array();

        // assume totals are missing
        self::$totals = false;

        // clean extracted data
        foreach($cells as $cell)
        {
          // skip if has image
          if ($cell->img) continue;

          // get css class identifiers in order to indetify columns
          $parser_css_classes = sfConfig::get('app_betway_parser_css_classes', array());
          $cell_css_class = $cell->attributes()->class;

          // identifiers
          $one_char_identitifier = substr($cell_css_class, -1);
          $two_chars_identitifier = substr($cell_css_class, -2);
          $three_chars_identitifier = substr($cell_css_class, -3);
          $four_chars_identitifier = substr($cell_css_class, -4);

          // check if a field was found in returned cells
          switch (true)
          {
            case array_key_exists($one_char_identitifier, $parser_css_classes):
              $column = $parser_css_classes[$one_char_identitifier];
              break;

            case array_key_exists($two_chars_identitifier, $parser_css_classes):
              $column = $parser_css_classes[$two_chars_identitifier];
              break;

            case array_key_exists($three_chars_identitifier, $parser_css_classes):
              $column = $parser_css_classes[$three_chars_identitifier];
              break;

            case array_key_exists($four_chars_identitifier, $parser_css_classes):
              $column = $parser_css_classes[$four_chars_identitifier];
              break;

            default: $column = null;
          }

          if ($column == $parser_css_classes['mT'])
          {
            self::$totals = true;
          }

          if ($column != null)
          {
            $rows[$rows_counter][$column] = competitionGeneratorHelper::cleanData($cell);
          }
        }
        $rows_counter++;
      }

      if (!self::$totals) self::doTotals($rows, $parser_css_classes);

       // additional operations for Soccer
      if (Sport::SOCCER == $this->sport->getId())
      {
        // find key in competitions array for current team name
        foreach ($rows as $row_key => $row_data)
        {
          $teams[$row_key] =  $row_data['team'];
        }
        //get corresponding over/under data
        $over_under = $this->getOverUnder($teams, $this->competition, $url, $this->query_strings);

        // add "over"
        foreach ($over_under['over'] as $key => $value)
        {
          $rows[$key]['over'] = $value;
        }

        // add "under"
        foreach ($over_under['under'] as $key => $value)
        {
          $rows[$key]['under'] = $value;
        }
      }
    }
    catch (Exception $e)
    {
      throw $e;
    }

    return $rows;
  }

  /**
   * Retrieve the corresponding over/under data for the
   * provided teams
   *
   * @param array $teams
   * @return array
   */
  private function getOverUnder($teams)
  {
    try
    {
      // build url
      $url = $this->url.'?page='.$this->query_strings['overunder']['page'];
      $url .= '&print='.$this->query_strings['overunder']['print'];
      $url .= '&language='.sfContext::getInstance()->getUser()->getCulture();
      $url .= '&tableid='.$this->competition->getTableId();

      // get html page content as SimpleXML object
      $xml = competitionGeneratorHelper::retrieveHtml($url);

      $table_rows =  $xml->xpath(sfConfig::get('app_betway_xpath_overunder'));

      $over = array();
      $under = array();
      $flipped_teams = array_flip($teams);

      // initialize data with 0 value in case it is not extracted
      foreach ($teams as $team)
      {
        $over[$flipped_teams[$team]] = 0;
        $under[$flipped_teams[$team]] = 0;
      }

      foreach ($table_rows as $row)
      {
        $cells = $row->children();

        // clean current team name
        $current_team_name = competitionGeneratorHelper::cleanData($cells[1]);

        // if team name is invalid skip it
        if (empty($current_team_name)) break;

        // clean over/under data
        $over[$flipped_teams[$current_team_name]] = competitionGeneratorHelper::cleanData($cells[3]);
        $under[$flipped_teams[$current_team_name]] = competitionGeneratorHelper::cleanData($cells[4]);
      }

      // sort arrays keys
      if (!empty($over) && !empty($under))
      {
        ksort($over);
        ksort($under);
      }

      return array('over' => $over, 'under' => $under);
    }
    catch (Exception $e)
    {
      throw $e;
    }
  }

  /**
   * Extract fixtures
   *
   * @return void
   */
  public function extractFixtures()
  {
    try
    {
      // build url
      $url = $this->url.'?page='.$this->query_strings['fixtures']['page'];
      $url .= '&round='.$this->query_strings['fixtures']['round'];
      $url .= '&num='.$this->query_strings['fixtures']['num'];
      $url .= '&print='.$this->query_strings['fixtures']['print'];
      $url .= '&language='.sfContext::getInstance()->getUser()->getCulture();
      $url .= '&tableid='.$this->competition->getTableId();

      // get html page content as SimpleXML object
      $xml = competitionGeneratorHelper::retrieveHtml($url);

      $fixtures = $xml->xpath(sfConfig::get('app_betway_xpath_fixtures'));

      if (count($fixtures) == 0)
      {
        throw new Exception('No fixtures available');
      }

      $rows = array();
      $rounds = array();
      $rows_counter = 0;
      foreach ($fixtures as $fixture)
      {
        $round_array = explode(' ', (string)$fixture->children()->thead->tr->td->table->tr->td[1]->span);
        $round = array_pop($round_array);

        // check if this fixtures as displayed with weeks and not rounds
        $i18n = new sfI18N(sfContext::getInstance()->getConfiguration());
        $week = $i18n->__('Week');

        if ($round_array[0] == $week) $round = $round - date('W') + 1;

        $table_trs = $fixture->children()->tbody->tr->td->table->tbody;

        foreach ($table_trs->tr as $table_td)
        {
          $cells = $table_td->td;
          if (is_object($cells[1]) && $cells[1]->font)
          {
            $one_team = competitionGeneratorHelper::cleanData($cells[1]);
            $another_team = competitionGeneratorHelper::cleanData($cells[1]->font);

            // if second team is the winner
            if (strpos($one_team, 'vs.') !== 0)
            {
              $game =  str_replace('vs.', '- ', $one_team.$another_team);
            }
            else
            {
              // if first team is the winner
              $game =  str_replace('vs.', ' -', $another_team.$one_team);
            }
          }
          else
          {
            $game = competitionGeneratorHelper::cleanData($cells[1]);
            $game = str_replace('vs.', '-', $game);
          }

          $rows[$rows_counter]['round'] = $round;
          $rows[$rows_counter]['game'] = $game;
          $rows[$rows_counter]['final_time'] = competitionGeneratorHelper::cleanData($cells[2]);
          $rows[$rows_counter]['half_time'] = competitionGeneratorHelper::cleanData($cells[3]);
          $rows_counter++;
        }
      }
    }
    catch (Exception $e)
    {
      throw $e;
    }

    return $rows;
  }

  /**
   * If totals are not extracted, "force" them
   *
   * @param array $rows
   * @return array
   */
  static private function doTotals(array $rows, $parser_css_classes)
  {
    foreach ($rows as $row_counter => $column)
    {
      $home_m = null;
      $away_m = null;
      $total_m = null;

      // home total
      if (isset($column[$parser_css_classes['wH']]))
      {
        $home_m += $column[$parser_css_classes['wH']];
      }

      if (isset($column[$parser_css_classes['lH']]))
      {
        $home_m += $column[$parser_css_classes['lH']];
      }

      if (isset($column[$parser_css_classes['dH']]))
      {
        $home_m += $column[$parser_css_classes['dH']];
      }

      // away total
      if (isset($column[$parser_css_classes['wA']]))
      {
        $away_m += $column[$parser_css_classes['wA']];
      }

      if (isset($column[$parser_css_classes['lA']]))
      {
        $away_m += $column[$parser_css_classes['wA']];
      }

      if (isset($column[$parser_css_classes['dA']]))
      {
        $away_m += $column[$parser_css_classes['dA']];
      }

      // set totals
      if ($home_m !== null)
      {
        $rows[$row_counter][$parser_css_classes['mH']] = $home_m;
        $total_m += $home_m;
      }

      if ($away_m !== null)
      {
        $rows[$row_counter][$parser_css_classes['mA']] = $away_m;
        $total_m += $away_m;
      }

      // overall totals
      if ($total_m !== null)
      {
        $rows[$row_counter][$parser_css_classes['mT']] = $total_m;
      }
    }

    return $rows;
  }
}
?>
