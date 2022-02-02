<?php
//require './secrets.php';
//require './ops/CloudApiOpsInterface.php';
//require './ops/Vars.php';
//require './ops/SendRequest.php';
require './vendor/autoload.php';

use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class IdentityProvider {

  /**
   * @var string client id from acquia cloud
   */
  private $clientId;

  /**
   * @var string client secret from acquia cloud
   */
  private $clientSecret;

  /**
   * IdentityProvider constructor.
   * @param $client_id
   * @param $client_secret
   */
  public function __construct($client_id, $client_secret) {
    $this->clientId = $client_id;
    $this->clientSecret = $client_secret;
  }

  /**
   * Returns Oath provider
   * @return GenericProvider
   */
  public function getProvider() {
    return new GenericProvider([
      'clientId' => $this->clientId,
      'clientSecret' => $this->clientSecret,
      'urlAuthorize' => '',
      'urlAccessToken' => 'https://accounts.acquia.com/api/auth/oauth/token',
      'urlResourceOwnerDetails' => '',
    ]);
  }

  /**
   * Returns an Oauth token
   * @return \League\OAuth2\Client\Token\AccessToken|\League\OAuth2\Client\Token\AccessTokenInterface
   */
  public function getAuthToken () {
    $provider = $this->getProvider();
    try {
      return $provider->getAccessToken('client_credentials');
    } catch (IdentityProviderException $e) {
      print_r($e->getMessage());
    }

  }
}
