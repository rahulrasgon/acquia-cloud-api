<?php

require './vendor/autoload.php';

class UpdateSolrIndexes implements CloudApiOpsInterface {

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
   * Updates solr core indexes from Acquia Cloud
   */
  public function sendRequest($options = [], $print_output = TRUE) {
    $output = [];
    $indexes = $this->vars->indexes;
    $headers = [
      'Content-type' => 'application/json',
    ];

    foreach ($indexes as $index) {
      $metadata = json_encode([
        "config_set_id" => $this->vars->config_set_id,
      ]);

      print_r("\n" . 'INDEX NAME => ' . $index . "\n");
      $request = $this->idp->getProvider()->getAuthenticatedRequest(
        'PUT',
        $this->vars->getUri() . '/environments/' . $this->vars->getEnvId() . '/search/indexes/' . $index,
        $this->idp->getAuthToken(),
        [
          'headers' => $headers,
          'body' => $metadata,
        ]
      );

      if ($print_output) {
        echo 'RESPONSE : ';
        print_r($this->sendRequest->send($request));
      }
      else {
        $output[] = $this->sendRequest->send($request);
      }
    }

    return $output;
  }
}
