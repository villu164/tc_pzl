<?php
// Step  1: Get the current Unix timestamp
$timestamp = time();

// Step  2: Create the signature
$signature = sha1($timestamp . 'credy');

// Step  3: Prepare the data
$data = [
    'first_name' => 'YourFirstName',
    'last_name' => 'YourLastName',
    'email' => 'your-email@example.com',
    'bio' => 'Introduction about yourself and why you would be a great fit for the position.',
    'technologies' => ['PHP', 'HTML', 'Docker'],
    'timestamp' => $timestamp,
    'signature' => $signature,
    'vcs_uri' => 'https://github.com/yourusername/your-repo'
];

// Step  4: Convert to JSON
$json = json_encode($data);

// Step  5: Send the POST request using cURL
$ch = curl_init('https://cv.microservices.credy.com/v1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

$response = curl_exec($ch);
curl_close($ch);

// Output the response
echo $response;
?>
