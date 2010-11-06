<?php

/**
 * competition module helper.
 *
 * @package    sport-statistics
 * @subpackage competition
 * @author     Cristian Radulescu
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class competitionGeneratorHelper extends BaseCompetitionGeneratorHelper
{
  /**
   * Process given parameter - trim and remove single and
   * double quotes
   *
   * @param mixed $data
   * @return mixed
   */
  static public function cleanData($data)
  {
    // trim
    $data = trim($data);

    // remove single and double quotes
    //$data = str_replace('\'', '', $data);
    //$data = str_replace('"', '', $data);

    return $data;
  }

  /**
   * Get html page into string
   *
   * @param string $url
   * @return SimpleXmlElement $xml
   */
  static public function retrieveHtml($url)
  {
    try
    {
      $dom = new DOMDocument();
      @$dom->loadHTMLFile($url);

      $xml = new SimpleXMLElement($dom->saveXML());
    }
    catch (Exception $e)
    {
      throw $e->getMessage();
    }

    return $xml;
  }
}
