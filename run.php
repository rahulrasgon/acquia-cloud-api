<?php

require './includes.php';

$idp = new IdentityProvider($clientId, $clientSecret);

// Get all indexes
//$solrIndexes = new GetSolrIndexes($idp);
//print_r($solrIndexes->sendRequest());

// Create new solr indexes
$solrIndexes = new CreateSolrIndexes($idp);
print_r($solrIndexes->sendRequest());
