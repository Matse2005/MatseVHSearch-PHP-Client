<?php

namespace MatseVH\MatseVHSearch;

class SearchClient
{
  public string $appId;
  public string $apiKey;

  public function create($app_id, $api_key)
  {
    $this->appId = $app_id;
    $this->apiKey = $api_key;
  }

  public function get($index)
  {
    // Perform a POST request to the API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://search.m-vh.eu/api/v1/get");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      "index" => $index,
      "app_id" => $this->appId,
      "key" => $this->apiKey
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
  }

  public function reverse($index)
  {
    // Perform a POST request to the API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://search.m-vh.eu/api/v1/reverse");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      "index" => $index,
      "app_id" => $this->appId,
      "key" => $this->apiKey
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
  }

  public function random($index)
  {
    // Perform a POST request to the API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://search.m-vh.eu/api/v1/random");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      "index" => $index,
      "app_id" => $this->appId,
      "key" => $this->apiKey
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
  }

  public function push($index, $objects)
  {
    // If objects are json, decode them
    if (is_string($objects)) {
      $objects = json_decode($objects, true);
    }

    // Check if objects is an array
    if (!is_array($objects)) {
      throw new \Exception("The objects parameter must be an array");
    }

    // Encode the objects as json
    $json = json_encode($objects);

    // Perform a POST request to the API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://search.m-vh.eu/api/v1/push");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      "index" => $index,
      "app_id" => $this->appId,
      "key" => $this->apiKey,
      "objects" => $json
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result, true);
  }

  public function search($index, $query)
  {
    // Perform a POST request to the API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://search.m-vh.eu/api/v1/search");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      "index" => $index,
      "query" => $query,
      "app_id" => $this->appId,
      "key" => $this->apiKey
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    // echo $result;
    return json_decode($result, true)["objects"];
  }
}
