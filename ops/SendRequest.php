<?php

require './vendor/autoload.php';

use GuzzleHttp\Client;

class SendRequest {

  /**
   * Sends an HTTP request Acquia Cloud
   * @param $request
   * @return string|bool
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function send($request) {
    if (!empty($request)) {
      try {
        $client = new Client();
        $response = $client->send($request);
        $responseBody = $response->getBody();

        // Add a breaker that differentiates output(s)
        print_r("\n\n");

        return $responseBody->getContents();
      } catch (Exception $e) {
        print_r($e->getMessage());
      }
    }

    return '';
  }

}
