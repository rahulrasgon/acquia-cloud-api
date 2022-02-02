<?php

class Vars {

  public $uri = 'https://cloud.acquia.com/api';
  public $env_id = '10859-bd001528-a8b3-27d4-29e1-34e36bb6ed42';
  public $config_set_id = 'shared.49a5c31863f8f714e3fadedf2648647f';
  public $database_roles = [
    'novartis_com',
    'novartis_ca',
    'novartis_co_jp',
  ];
  public $indexes = [
    'ABMQ-57524.dev.novartis_co_jp',
  ];

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
