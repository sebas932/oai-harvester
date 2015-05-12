<?php
require_once('vendor/autoload.php');
use Scriptotek\OaiPmh\Client as OaiPmhClient;  
 
//$recordId = 'oai:cgspace.cgiar.org:10568/52163'; 

getCGSpace('oai:cgspace.cgiar.org:10568/52163');

function getCGSpace($recordId){ 
	$url = 'https://cgspace.cgiar.org/oai/request';   
	$node = requestMetadata($url, $recordId)->first('oai_dc:dc');  

	$json = json_encode(getMetadata($node));
	echo ($json);
}


function requestMetadata($url, $recordId){  
	$client= new OaiPmhClient($url, array(
    'schema' => 'oai_dc',
    'user-agent' => 'DataTools/0.1',
    'max-retries' => 10,
    'sleep-time-on-error' => 30,
	));

	try {
    $record = $client->record($recordId); 
	} catch (Scriptotek\OaiPmh\ConnectionError $e) {
	    echo $e->getMsg();
	    die;
	} catch (Scriptotek\OaiPmh\BadRequestError $e) {
	    echo 'Bad request: ' . $e->getMsg() . "\n";
	    die;
	}

	//return $record->datestamp . "\n";
	return $record->data;

}


function getMetadata ($node){

	$output = array();
	// Title
	foreach ($node->all('dc:title') as $item) {
   	$output["title"][] = (string)$item;
	}
	// Creator
	foreach ($node->all('dc:creator') as $item) {
   	$output["creator"][] = (string)$item;
	}
	// Subject
	foreach ($node->all('dc:subject') as $item) {
   	$output["subject"][] = (string)$item;
	}
	// Description
	foreach ($node->all('dc:description') as $item) {
   	$output["description"][] = (string)$item;
	}
	// Publisher
	foreach ($node->all('dc:publisher') as $item) {
   	$output["publisher"][] = (string)$item;
	} 
	// Contributor
	foreach ($node->all('dc:contributor') as $item) {
   	$output["contributor"][] = (string)$item;
	}
	// Date
	foreach ($node->all('dc:date') as $item) {
   	$output["date"][] = (string)$item;
	}
	// Type
	foreach ($node->all('dc:type') as $item) {
   	$output["type"][] = (string)$item;
	}
	// Format
	foreach ($node->all('dc:format') as $item) {
   	$output["format"][] = (string)$item;
	}
	// Identifiers
	foreach ($node->all('dc:identifier') as $item) {
   	$output["identifier"][] = (string)$item;
	}
	// Source
	foreach ($node->all('dc:source') as $item) {
   	$output["source"][] = (string)$item;
	}
	// Language
	foreach ($node->all('dc:language') as $item) {
   	$output["language"][] = (string)$item;
	}
	// Relation
	foreach ($node->all('dc:relation') as $item) {
   	$output["relation"][] = (string)$item;
	}
	// Coverage
	foreach ($node->all('dc:coverage') as $item) {
   	$output["coverage"][] = (string)$item;
	}
	// Rights
	foreach ($node->all('dc:rights') as $item) {
   	$output["rights"][] = (string)$item;
	} 

	return $output;
}

