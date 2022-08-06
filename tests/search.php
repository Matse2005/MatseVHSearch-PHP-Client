<?php

require_once '../vendor/autoload.php';

use MatseVH\MatseVHSearch\SearchClient;

if ($_POST) {
  // Set header for json response
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");

  $client = new SearchClient();
  $client->create($_POST['app_id'], $_POST['api_key']);

  $result = $client->search($_POST['index'], $_POST['query']);
  echo json_encode($result);
} else {
?>
  <form method="post">
    <input type="text" name="index" value="INDEX">
    <!-- 
      Search query is used to search for objects in the index.
     -->
    <input type="text" name="query">
    <!-- 
      Hidden input for the app_id and api_key is used to prevent CSRF attacks.
     -->
    <input type="hidden" name="app_id" value="TEST_APP_ID">
    <input type="hidden" name="api_key" value="TEST_API_KEY">
    <input type="submit" value="Push">
  <?php
}
