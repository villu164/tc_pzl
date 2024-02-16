<?php
require_once __DIR__ . '/vendor/autoload.php';
$jsonx = new danharper\JSONx\JSONx;
$timestamp = time();
$signature = sha1($timestamp . 'credy');
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
$output = $jsonx->toJSONx($data);

echo $output;
