<?php

require './vendor/autoload.php';

class DeleteSolrIndexes implements CloudApiOpsInterface {

  /**
   * @var IdentityProvider
   */
  private $idp;

  /**
   * @var SendRequest
   */
  public $sendRequest;

  /**
   * @var Vars
   */
  public $vars;

  /**
   * Constructor class
   * @param IdentityProvider $idp
   */
  public function __construct(IdentityProvider $idp) {
    $this->idp = $idp;
    $this->sendRequest = new SendRequest();
    $this->vars = new Vars();
  }

  /**
   * Gets solr core indexes from Acquia Cloud
   */
  public function sendRequest($options = [], $print_output = TRUE) {
    $indexes = $this->vars->indexes;
    foreach ($indexes as $index) {
      print_r("\n" . 'INDEX => ' . $index . "\n");
      $solrIndex = new DeleteSolrIndex($this->idp);
      $solrIndex->sendRequest(['indexId' => $index]);
    }
  }

}
