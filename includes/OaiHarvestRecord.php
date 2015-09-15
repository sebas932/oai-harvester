<?php
require_once('../libs/php/autoload.php');
use Scriptotek\OaiPmh\Client as OaiPmhClient;    

class OaiHarvestRecord {
	public $record;
	public $error = "-";

	private $url;
	private $recordId;
	
	function __construct($url, $recordId){  
		$this->url = $url;
		$this->recordId = $recordId;

		$client= new OaiPmhClient($this->url, array(
	    'schema' => 'oai_dc',
	    'user-agent' => 'DataTools/0.1',
	    'max-retries' => 10,
	    'sleep-time-on-error' => 30,
		));

		try {
	    $record = $client->record($this->recordId); 
		} catch (Scriptotek\OaiPmh\ConnectionError $e) {
			$this->error = $e->getMessage(); 
		} catch (Scriptotek\OaiPmh\BadRequestError $e) {
			$this->error = $e->getMessage();
		}

  	if ($record != null) {
  		$this->record = $record->data->first('oai_dc:dc');
  	}
		
	}

	public function getMetadata (){ 
		$record = $this->record;
		$output = array();

		if ($record != null) {
			// Title
			foreach ($record->all('dc:title') as $item) {
		   	$output["title"][] = (string)$item;
			}
			// Creator
			foreach ($record->all('dc:creator') as $item) {
		   	$output["creator"][] = (string)$item;
			}
			// Subject
			foreach ($record->all('dc:subject') as $item) {
		   	$output["subject"][] = (string)$item;
			}
			// Description
			foreach ($record->all('dc:description') as $item) {
		   	$output["description"][] = (string)$item;
			}
			// Publisher
			foreach ($record->all('dc:publisher') as $item) {
		   	$output["publisher"][] = (string)$item;
			} 
			// Contributor
			foreach ($record->all('dc:contributor') as $item) {
		   	$output["contributor"][] = (string)$item;
			}
			// Date
			foreach ($record->all('dc:date') as $item) {
		   	$output["date"][] = (string)$item;
			}
			// Type
			foreach ($record->all('dc:type') as $item) {
		   	$output["type"][] = (string)$item;
			}
			// Format
			foreach ($record->all('dc:format') as $item) {
		   	$output["format"][] = (string)$item;
			}
			// Identifiers
			foreach ($record->all('dc:identifier') as $item) {
		   	$output["identifier"][] = (string)$item;
			}
			// Source
			foreach ($record->all('dc:source') as $item) {
		   	$output["source"][] = (string)$item;
			}
			// Language
			foreach ($record->all('dc:language') as $item) {
		   	$output["language"][] = (string)$item;
			}
			// Relation
			foreach ($record->all('dc:relation') as $item) {
		   	$output["relation"][] = (string)$item;
			}
			// Coverage
			foreach ($record->all('dc:coverage') as $item) {
		   	$output["coverage"][] = (string)$item;
			}
			// Rights
			foreach ($record->all('dc:rights') as $item) {
		   	$output["rights"][] = (string)$item;
			} 
		}else{
			$output["errorMessage"] = $this->error;
		}
		return $output;
	}
}





