<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$allowed = [
    'chart/0/albums',
    'album',
    'artist',
    // add more as needed
];

if (!isset($_GET['endpoint'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing endpoint parameter.']);
    exit();
}

$endpoint = $_GET['endpoint'];
$parts = explode('/', $endpoint);

if ($parts[0] === 'chart' && $endpoint === 'chart/0/albums') {
    $url = 'https://api.deezer.com/' . $endpoint;
} elseif (in_array($parts[0], ['album', 'artist']) && isset($parts[1]) && is_numeric($parts[1])) {
    $url = 'https://api.deezer.com/' . $parts[0] . '/' . $parts[1];
} else {
    http_response_code(403);
    echo json_encode(['error' => 'Endpoint not allowed.']);
    exit();
}

$response = file_get_contents($url);
if ($response === FALSE) {
    http_response_code(502);
    echo json_encode(['error' => 'Failed to fetch from Deezer.']);
    exit();
}
echo $response; 