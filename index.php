<?php
require_once('vendor/autoload.php');
use Scriptotek\OaiPmh\Client as OaiPmhClient;

$url = 'https://thedata.harvard.edu/dvn/OAIHandler';

$client = new OaiPmhClient($url, array(
    'schema' => 'marcxchange',
    'user-agent' => 'MyTool/0.1',
    'max-retries' => 10,
    'sleep-time-on-error' => 30,
));


try {
    $record = $client->record('hdl:1902.1/22584');
} catch (Scriptotek\OaiPmh\ConnectionError $e) {
    echo $e->getMsg();
    die;
} catch (Scriptotek\OaiPmh\BadRequestError $e) {
    echo 'Bad request: ' . $e->getMsg() . "\n";
    die;
}

echo $record->identifier . "\n";
echo $record->datestamp . "\n";
echo $record->data->asXML() . "\n";