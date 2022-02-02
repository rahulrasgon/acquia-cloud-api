<?php

require './vendor/autoload.php';

class GetSolrIndex implements CloudApiOpsInterface {

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
    if (!isset($options['indexId']) || empty($options['indexId'])) {
      $message = 'Index ID is mandatory';
      if ($print_output) {
        print_r($message);
        return FALSE;
      }
      else {
        return $message;
      }
    }

    $output = [];
    $request = $this->idp->getProvider()->getAuthenticatedRequest(
      'GET',
      $this->vars->getUri() . '/environments/' . $this->vars->getEnvId() . '/search/indexes/' . $options['indexId'],
      $this->idp->getAuthToken()
    );

    if ($print_output) {
      echo 'RESPONSE : ';
      print_r($this->sendRequest->send($request));
    }
    else {
      $output[] = $this->sendRequest->send($request);
    }

    return $output;
  }
}
