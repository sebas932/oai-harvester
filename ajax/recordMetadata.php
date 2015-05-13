<?php
//require_once('vendor/autoload.php');
require '../includes/OaiHarvestRecord.php';
 

if (isset($_GET["source"])){
	if($_GET["source"]=="cgspace"){
		getCGSpace($_GET["identifier"]);
	}
}

function getCGSpace($recordId){ 
	$url = 'https://cgspace.cgiar.org/oai/request';   
	$record = new OaiHarvestRecord($url, $recordId);    
	$json = json_encode($record->getMetadata());
	print_r($json); 
}