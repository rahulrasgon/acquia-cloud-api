<?php

require './includes.php';

$idp = new IdentityProvider($clientId, $clientSecret);

// Get all indexes
$solrIndexes = new GetSolrIndexes($idp);
$solrIndexes->sendRequest();

// Create new solr indexes
//$solrIndexes = new CreateSolrIndexes($idp);
//$solrIndexes->sendRequest();
