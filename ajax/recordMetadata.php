<?php
//require_once('vendor/autoload.php');
require '../includes/OaiHarvestRecord.php';
 

if (isset($_GET["source"])){
	if($_GET["source"]=="cgspace"){
		getCGSpace($_GET["identifier"]);
	}else if($_GET["source"]=="agtrials"){
		getAgTrials($_GET["identifier"]);
	}else if($_GET["source"]=="amkn"){
		getAmkn($_GET["identifier"]);
	}
}

function getCGSpace($recordId){ 
	$url = 'https://cgspace.cgiar.org/oai/request';   
	$record = new OaiHarvestRecord($url, $recordId);    
	$json = json_encode($record->getMetadata());
	print_r($json); 
}

function getAgTrials($recordId){ 
	$url = 'http://oai2.agtrials.org/oai.php';   
	$record = new OaiHarvestRecord($url, $recordId);    
	$json = json_encode($record->getMetadata());
	print_r($json); 
}

function getAmkn($recordId){ 
	$url = 'http://lab.amkn.org/aoi/';   
	$record = new OaiHarvestRecord($url, $recordId);    
	$json = json_encode($record->getMetadata());
	print_r($json); 
}