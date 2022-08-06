<?php

require_once '../vendor/autoload.php';

use MatseVH\MatseVHSearch\SearchClient;

if ($_POST) {
  $client = new SearchClient();
  $client->create($_POST['app_id'], $_POST['api_key']);

  $result = $client->push($_POST['index'], $_POST['objects']);
} else {
?>
  <form method="post">
    <input type="text" name="index" value="INDEX">
    <!-- 
      Textarea is used to allow multiple objects to be pushed at once.
     -->
    <textarea name="objects"></textarea>
    <!-- 
      Hidden input for the app_id and api_key is used to prevent CSRF attacks.
     -->
    <input type="hidden" name="app_id" value="TEST_APP_ID">
    <input type="hidden" name="api_key" value="TEST_API_KEY">
    <input type="submit" value="Push">
  <?php
}
