<?php

require './vendor/autoload.php';

class CreateSolrIndexes implements CloudApiOpsInterface {

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
  public function sendRequest($print_output = TRUE) {
    $output = [];
    $database_roles = $this->vars->database_roles;
    $headers = [
      'Content-type' => 'application/json',
    ];

    foreach ($database_roles as $database_role) {
      $metadata = json_encode([
        "config_set_id" => $this->vars->config_set_id,
        "database_role" => $database_role,
      ]);

      print_r("\n" . 'DATABASE ROLE => ' . $database_role . "\n");
      $request = $this->idp->getProvider()->getAuthenticatedRequest(
        'POST',
        $this->vars->getUri() . '/environments/' . $this->vars->getEnvId() . '/search/indexes',
        $this->idp->getAuthToken(),
        [
          'headers' => $headers,
          'body' => $metadata,
        ]
      );

      if ($print_output) {
        print_r($this->sendRequest->send($request));
      }
      else {
        $output[] = $this->sendRequest->send($request);
      }
    }

    return $output;
  }
}
