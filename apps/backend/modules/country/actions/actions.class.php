<?php

require_once dirname(__FILE__).'/../lib/countryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/countryGeneratorHelper.class.php';

/**
 * country actions.
 *
 * @package    sport-statistics
 * @subpackage country
 * @author     Cristian Radulescu
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class countryActions extends autoCountryActions
{
  /**
   * Show competitions with filter on country
   * @param sfWebRequest $request
   */
  public function executeListCompetitions($request)
  {
    $country_id = $request->getParameter('id');

    // set filter for countries and redirect
    $this->getUser()->setAttribute('competition.filters', array('country_id' => $country_id), 'admin_module');
    $this->redirect('@competition');
  }
}
