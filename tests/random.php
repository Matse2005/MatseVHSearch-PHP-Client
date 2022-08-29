<?php
// Set header for json response
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once '../vendor/autoload.php';

use MatseVH\MatseVHSearch\SearchClient;

$client = new SearchClient();
$client->create("TEST_APP_ID", "TEST_API_KEY");

$result = $client->get("INDEX");
echo json_encode($result);
