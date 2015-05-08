<?php
require_once('vendor/autoload.php');
use Scriptotek\OaiPmh\Client as OaiPmhClient;  
 
//$recordId = 'oai:cgspace.cgiar.org:10568/52163'; 

getCGSpace('oai:cgspace.cgiar.org:10568/52163');

function getCGSpace($recordId){ 
	$url = 'https://cgspace.cgiar.org/oai/request';
	echo getMetadata($url, $recordId);
}


function getMetadata($url, $recordId){  
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
	return $record->data->asXML();

}