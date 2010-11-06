<?php

require_once dirname(__FILE__).'/../lib/sportGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sportGeneratorHelper.class.php';

/**
 * sport actions.
 *
 * @package    sport-statistics
 * @subpackage sport
 * @author     Cristian Radulescu
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class sportActions extends autoSportActions
{
  /**
   * Show competitions with filter on sport
   * @param sfWebRequest $request
   */
  public function executeListCompetitions($request)
  {
    $sport_id = $request->getParameter('id');

    // set filter for countries and redirect
    $this->getUser()->setAttribute('competition.filters', array('sport_id' => $sport_id), 'admin_module');
    $this->redirect('@competition');
  }
}
