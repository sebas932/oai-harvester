<?php
//require_once('vendor/autoload.php');
require '../includes/OaiHarvestRecord.php';

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
 
if (isset($_GET["source"])){
	$recordId = $_GET["identifier"];
	switch ($_GET["source"]) {
		case 'cgspace':
			$url = 'https://cgspace.cgiar.org/oai/request';
			break;
		case 'agtrials':
			$url = 'http://oai2.agtrials.org/oai2.php'; 
			break;
		case 'amkn':
			$url = 'http://lab.amkn.org/oai/';  
			break;	
		default:
			die;
			break;
	}
	showMetadata($url, $recordId);
}

function showMetadata($url, $recordId){
	$record = new OaiHarvestRecord($url, $recordId);    
	$json = json_encode($record->getMetadata());
	print_r($json);
}