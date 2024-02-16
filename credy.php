<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once 'includes/ApiRequest.php';
require_once 'includes/TimeService.php';

$timeService = new TimeService();
# Make sure the server time is sufficiently correct
$timeService->checkTimeDifference();

$data = [
    'first_name' => 'Villu',
    'last_name' => 'Orav',
    'email' => 'villu164@gmail.com',
    'bio' => "I'm a Developer my nature and I use coding as a tool to solve my problems. I'm also into security, bug bounties, CTF-s puzzles, technology, hardware, cloud... Well you could say that I'm quite nerdsnipeable. With the puzzle, I hope to show my capability to do research, PHP, debugging, source code reading, docker, OOP. I cannot really show MySQL/MariaDB knowledge, because my background has heavily been PostgreSQL, but as a core concept, I know how SQL in general works",
    'technologies' => ['PHP', 'HTML', 'Docker', 'Ruby', 'PostgreSQL', 'ChatGPT/LLM'],
    'vcs_uri' => 'https://github.com/villu164/tc_pzl'
];

$apiRequest = new ApiRequest('https://cv.microservices.credy.com/v1');
$response = $apiRequest->sendRequest($data);

echo $response;
