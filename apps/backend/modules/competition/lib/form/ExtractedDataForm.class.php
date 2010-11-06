<?php

/**
 * Competition Extracted Data form class.
 *
 * @package    backend
 * @subpackage competition
 * @author     Cristian Radulescu
 */
class ExtractedDataForm extends BaseFormDoctrine
{
  /**
   * Model name
   * @var string
   */
  private $model_name;

  /**
   * Default data for textarea
   * @var string
   */
  public $default;

  /**
   * Default data for id field
   * @var int
   */
  public $competition_id;

  /**
   * Constructor
   *
   * @param array $extracted_data
   * @param string $model_name
   * @return void
   */
  public function __construct($extracted_data, $model_name)
  {
    $this->model_name = $model_name;
    $this->createDefaultData($extracted_data);
    parent::__construct();
  }

  /**
   * Setup
   */
  public function setup()
  {
    // textarea options
    $options = array('label' => 'Query');

    // textarea attributes
    $attributes = array('rows' => 25,
                        'cols' => 170);

    $this->setWidgets(array(
      'extracted_data_json' => new sfWidgetFormTextarea($options, $attributes),
      'id' => new sfWidgetFormInputHidden(),
    ));

    $this->setDefault('extracted_data_json', $this->default);
    $this->setDefault('id', $this->competition_id);

    parent::setup();
  }

  /**
   * Set default data
   *
   * @param array $extracted_data
   */
  public function createDefaultData($extracted_data)
  {
    // default data for textarea
    $this->default = '';
    $this->competition_id = sfContext::getInstance()->getRequest()->getParameter('id');

    foreach ($extracted_data as $data)
    {
      // add competition id to array
      $data['competition_id'] = $this->competition_id;

      // json encode for output
      $this->default .= json_encode($data);

      // add double endline for visiblity
      $this->default .= "\r\n\r\n";
    }
  }

  /**
   * Model name
   *
   * @return string
   */
  public function getModelName()
  {
    return $this->model_name;
  }
}
