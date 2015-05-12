<?php
//require_once('vendor/autoload.php');
require '../includes/OaiHarvestRecord.php';
 

getCGSpace('oai:cgspace.cgiar.org:10568/65984');

function getCGSpace($recordId){ 
	$url = 'https://cgspace.cgiar.org/oai/request';   
	$record = new OaiHarvestRecord($url, $recordId);    
	$json = json_encode($record->getMetadata());
	print_r($json);
	/*
	echo "<pre>";
	var_dump($record);
	echo "</pre>";
	*/
}