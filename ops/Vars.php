<?php

class Vars {

  public $uri = 'https://cloud.acquia.com/api';
  public $env_id = '[ENV-ID]';
  public $config_set_id = '[CONFIG-SET-ID]';
  public $database_roles = [];
  public $indexes = [];

  public function getUri() {
    return $this->uri;
  }

  public function getEnvId() {
    return $this->env_id;
  }

  public function getConfigSetId() {
    return $this->config_set_id;
  }

  public function getDatabaseRoles() {
    return $this->database_roles;
  }

  public function getIndexes() {
    return $this->indexes;
  }

}
