<p align="center">
  <h4 align="center">The perfect starting point to integrate <a href="https://search.m-vh.eu" target="_blank">MatseVHSearch</a> within your PHP project</h4>

  <p align="center">
    <a href="https://packagist.org/packages/matsevh/matsevhsearch"><img src="http://poser.pugx.org/matsevh/matsevhsearch/v" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/matsevh/matsevhsearch"><img src="http://poser.pugx.org/matsevh/matsevhsearch/v/unstable" alt="Latest Unstable Version"></a>
    <a href="https://packagist.org/packages/matsevh/matsevhsearch"><img src="http://poser.pugx.org/matsevh/matsevhsearch/downloads" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/matsevh/matsevhsearch"><img src="http://poser.pugx.org/matsevh/matsevhsearch/license" alt="License"></a>
    <a href="https://packagist.org/packages/matsevh/matsevhsearch"><img src="http://poser.pugx.org/matsevh/matsevhsearch/require/php" alt="PHP Version Require"></a>
  </p>
</p>

## ✨ Features

- Thin & minimal low-level HTTP client to interact with MatseVHSearch's API
- Supports php `>=7.4`.

## 💡 Getting Started

First, install MatseVHSearch PHP API Client via the [composer](https://getcomposer.org/) package manager:

```bash
composer require matsevh/matsevhsearch
```

Then you can use it in your project:

```php

// Require the autoloader from the composer
require_once 'vendor/autoload.php';

// Use the MatseVHSearch PHP API Client
use MatseVH\MatseVHSearch\SearchClient;

// Instantiate the client
$client = new SearchClient('<application_id>', '<api_key>');

// Add the function you want to use (You can find the function below)
```

**Functions:**

Push:

```php
// Push some data to the index -> products
// It doesn't matter if the data is already in the index
// The already existing data will be deleted and replaced by the new data
// You can push a PHP array or a JSON string array
$php = array(
    array(
        'objectID' => '1',
        'title' => 'My first object',
        'description' => 'This is my first object',
        'price' => '10.00',
        'currency' => 'EUR',
        'image' => 'https://example.com/image.jpg',
        'url' => 'https://example.com/product/1',
        'brand' => 'My brand',
        'category' => 'My category',
        'tags' => array('tag1', 'tag2'),
        'attributes' => array(
            'attribute1' => 'value1',
            'attribute2' => 'value2'
        )
    ),
    array(
        'objectID' => '2',
        'title' => 'My second object',
        'description' => 'This is my second object',
        'price' => '20.00',
        'currency' => 'EUR',
        'image' => 'https://example.com/image.jpg',
        'url' => 'https://example.com/product/2',
        'brand' => 'My brand',
        'category' => 'My category',
        'tags' => array('tag1', 'tag2'),
        'attributes' => array(
            'attribute1' => 'value1',
            'attribute2' => 'value2'
        )
    )
);

// In json format it would look like this:
$json = '[
          {
            "objectID":"1",
            "title":"My first object",
            "description":"This is my first object",
            "price":"10.00",
            "currency":"EUR",
            "image":"https://example.com/image.jpg",
            "url":"https://example.com/product/1",
            "brand":"My brand",
            "category":"My category",
            "tags":["tag1","tag2"],
            "attributes":{
              "attribute1":"value1",
              "attribute2":"value2"
            }
          },
          {
            "objectID":"2",
            "title":"My second object",
            "description":"This is my second object",
            "price":"20.00",
            "currency":"EUR",
            "image":"https://example.com/image.jpg",
            "url":"https://example.com/product/2",
            "brand":"My brand",
            "category":"My category",
            "tags":["tag1","tag2"],
            "attributes":{
              "attribute1":"value1",
              "attribute2":"value2"
            }
          }
        ]';

// Push the data to the index -> products
$client->push('products', $php); // or $client->push('products', $json);
```

Search:

```php
// Search for products
$results = $client->search('products', 'My first object');
```

Get:

```php
// Get all the pushed data from the index -> products
$results = $client->get('products');
```

Reverse:

```php
// Get all the pushed data reversed from the index -> products
$results = $client->reverse('products');
```

Random:

```php
// Get all the pushed data in random order from the index -> products
$results = $client->random('products');
```

Need help? Contact me by email: [matse@vanhorebeek.be](mailto:matse@vanhorebeek.be)

## 📄 License

MatseVHSearch PHP API Client is an open-sourced software licensed under the [MIT license](LICENSE.md).
