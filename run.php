<?php

require './includes.php';

$idp = new IdentityProvider($clientId, $clientSecret);

// Gets all solr indexes
$solrIndexes = new GetSolrIndexes($idp);
$solrIndexes->sendRequest();

// Gets a specific solr index
//$solrIndex = new GetSolrIndex($idp);
//$solrIndex->sendRequest(['indexId' => '']);

// Creates multiple new solr indexes at once
//$solrIndexes = new CreateSolrIndexes($idp);
//$solrIndexes->sendRequest();

// Deletes multiple solr indexes at once
//$solrIndexes = new DeleteSolrIndexes($idp);
//$solrIndexes->sendRequest();

// Deletes a specific solr index
//$solrIndex = new DeleteSolrIndex($idp);
//$solrIndex->sendRequest(['indexId' => '']);

// Updates multiple new solr indexes at once
// $solrIndexes = new UpdateSolrIndexes($idp);
// $solrIndexes->sendRequest();