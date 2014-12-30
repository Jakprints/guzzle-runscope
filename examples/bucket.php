<?php

require __DIR__ . '/../vendor/autoload.php';

use GuzzleHttp\Client;
use Runscope\Plugin\RunscopePlugin;

$client = new Client();
$runscopePlugin = new RunscopePlugin('bucket_key');
// authenticated bucket
// $runscopePlugin = new RunscopePlugin('bucket_key', 'auth_token');

// service region
// $runscopePlugin = new RunscopePlugin('bucket_key', null, 'eu1.runscope.net');

$client->getEmitter()->attach($runscopePlugin);

// Send the request and get the response
$response = $client->get('https://api.github.com/');
echo $response->getBody();
echo $response->getHeader('Content-Length');
