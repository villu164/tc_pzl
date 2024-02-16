<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'includes/ApiRequest.php';

$data = [
    'first_name' => 'Villu',
    'last_name' => 'Orav',
    'email' => 'villu164@gmail.com',
    'bio' => 'TODO:',
    'technologies' => ['PHP', 'HTML', 'Docker'],
    'timestamp' => $timestamp,
    'signature' => $signature,
    'vcs_uri' => 'https://github.com/villu164/tc_pzl'
];

$apiRequest = new ApiRequest('https://cv.microservices.credy.com/v1');
$response = $apiRequest->sendRequest($data);

echo $response;
