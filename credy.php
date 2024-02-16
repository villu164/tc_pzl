<?php
// Step  1: Get the current Unix timestamp
$timestamp = time();

// Step  2: Create the signature
$signature = sha1($timestamp . 'credy');

// Step  3: Prepare the data
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

// Step  4: Convert to JSON
$json = json_encode($data, JSON_PRETTY_PRINT);

// Step  5: Send the POST request using cURL
// I have a 127.0.0.1 host.docker.internal in /etc/hosts, to "escape" docker
// nc -l 8123 # To see what I'm sending
$ch = curl_init('http://host.docker.internal:8123/miniserver.php');
// $ch = curl_init('https://cv.microservices.credy.com/v1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/xml']);

$response = curl_exec($ch);
curl_close($ch);

// Output the response
echo $response;
?>
