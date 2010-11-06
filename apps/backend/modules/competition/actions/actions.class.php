<?php

require_once dirname(__FILE__).'/../lib/competitionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/competitionGeneratorHelper.class.php';

/**
 * competition actions.
 *
 * @package    sport-statistics
 * @subpackage competition
 * @author     Cristian Radulescu
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class competitionActions extends autoCompetitionActions
{
  /**
   * Execute the extract tables action
   * 
   * @param sfWebRequest $request
   * @return void
   */
  public function executeListExtractTables(sfWebRequest $request)
  {
    // get competition id from request
    $competition_id = $request->getParameter('id');

    if ($request->isMethod('post'))
    {
      try
      {
        $competition = Doctrine::getTable('Competition')->find($competition_id);
        $country = Doctrine::getTable('Country')->find($competition->getCountryId());

        $json_data = explode("\r\n\r\n", $request->getParameter('extracted_data_json'));

        // start transaction
        $conn = Doctrine::getConnectionByTableName('Statistics');
        $conn->beginTransaction();

        // remove old statistics for current competition
        Doctrine::getTable('Statistics')->cleanup($competition_id);

        // create statistics rows
        foreach ($json_data as $row)
        {
          $row_array = get_object_vars(json_decode($row));
          if (is_array($row_array))
          {
            $statistics = new Statistics();
            $statistics->setArray($row_array);
            $statistics->save();
          }
        }

        // update competition
        $competition->setStatisticsUpdatedAt(date('Y-m-d H:m:s', time()));
        $competition->save();

        // commit transaction
        $conn->commit();

        $this->getUser()->setFlash('notice', 'Statistics successfully updated for "'.$country.' - '.$competition.'"');
      }
      catch (Exception $e)
      {
        // redirect to competition page with flash set
        $this->getUser()->setFlash('error', 'Operation failed! Following error occured: '.$e->getMessage());
      }

      $this->redirect('@competition');
    }
    else
    {
      try
      {
        $betway_interface = new betwayInterface($competition_id);
        $extracted_tables = $betway_interface->extractTables();

        // build query textarea
        $this->extracted_tables_form = new ExtractedDataForm($extracted_tables, 'Statistics');

        // get columns using first row from the extrated tables
        $columns = array_keys($extracted_tables[0]);
        $this->values = $extracted_tables;

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

        $this->groups = $template_groups;

         $this->getUser()->setFlash('notice', 'Data successfully extracted!');
      }
      catch (Exception $e)
      {
        // redirect to competition page with flash set
        $this->getUser()->setFlash('error', 'Operation failed! Following error occured: '.$e->getMessage());
        $this->redirect('@competition');
      }
    }
  }

  /**
   * Execute the extract fixtures action (auto)
   *
   * @param sfWebRequest $request
   * @return void
   */
  public function executeListExtractFixtures(sfWebRequest $request)
  {
    // get competition id from request
    $competition_id = $request->getParameter('id');

    if ($request->isMethod('post'))
    {
      try
      {
        $competition = Doctrine::getTable('Competition')->find($competition_id);
        $country = Doctrine::getTable('Country')->find($competition->getCountryId());

        $json_data = explode("\r\n\r\n", $request->getParameter('extracted_data_json'));

        // start transaction
        $conn = Doctrine::getConnectionByTableName('Fixture');
        $conn->beginTransaction();

        // remove old statistics for current competition
        Doctrine::getTable('Fixture')->cleanup($competition_id);

        // create fixtures row
        foreach ($json_data as $row)
        {
          $row_array = get_object_vars(json_decode($row));
          if (is_array($row_array))
          {
            $fixture = new Fixture();
            $fixture->setArray($row_array);
            $fixture->save();
          }
        }

        // update competition
        $competition->setFixturesUpdatedAt(date('Y-m-d H:m:s', time()));
        $competition->save();

        // commit transaction
        $conn->commit();

        $this->getUser()->setFlash('notice', 'Fixtures successfully updated for "'.$country.' - '.$competition.'"');
      }
      catch (Exception $e)
      {
        // redirect to competition page with flash set
        $this->getUser()->setFlash('error', 'Operation failed! Following error occured: '.$e->getMessage());
      }

      $this->redirect('@competition');
    }
    else
    {
      try
      {
        $betway_interface = new betwayInterface($competition_id);
        $extracted_fixtures = $betway_interface->extractFixtures();

        // build query textarea
        $this->extracted_fixtures_form = new ExtractedDataForm($extracted_fixtures, 'Fixture');

        // get columns using first row from the extrated tables
        $columns = array_keys($extracted_fixtures[0]);
        $this->values = $extracted_fixtures;

        // column groups
        $groups = sfConfig::get('app_fixtures_groups', array());

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

        $this->groups = $template_groups;

         $this->getUser()->setFlash('notice', 'Data successfully extracted!');
      }
      catch (Exception $e)
      {
        // redirect to competition page with flash set
        $this->getUser()->setFlash('error', 'Operation failed! Following error occured: '.$e->getMessage());
        $this->redirect('@competition');
      }
    }
  }

  /**
   * Execute the activate batch action
   *
   * @param sfWebRequest $request
   * @return void
   */
  public function executeBatchActivate(sfWebRequest $request)
  {
    $this->toggleActive($request);
  }

  /**
   * Execute the activate batch action
   * 
   * @param sfWebRequest $request
   * @return void
   */
  public function executeBatchDeactivate(sfWebRequest $request)
  {
    $this->toggleActive($request, false);
  }

  /**
   * Wrapper for the activate/deactivate batch actions
   *
   * @param sfWebRequest $request
   * @param boolean $active
   * @return void
   */
  public function toggleActive(sfWebRequest $request, $active = true)
  {
    $ids = $request->getParameter('ids');

    $q = Doctrine_Query::create()
        ->from('Competition c')
        ->whereIn('c.id', $ids);

    foreach ($q->execute() as $competition)
    {
      $competition->activate($active);
    }

    $this->getUser()->setFlash('notice', 'The selected competitions have been '.($active?'':'de').'activated successfully.');
    $this->redirect('@competition');
  }
}
