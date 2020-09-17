<?php

require './vendor/autoload.php';
require './config.php';

use Vimeo\Vimeo;


// $client = new Vimeo("{$client_id}", "{$client_secret}", "{$access_token}");

// $response = $client->request('/tutorial', array(), 'GET');
// print_r($response);


## Edit the title and description
// $uri = '';
// $client->request($uri, array(
//     'name' => '{new video title}',
//     'description' => '{new video description}',
// ), 'PATCH');

// echo 'The title and description for ' . $uri . ' has been edited.';


## Set Vimeo privacy
// $client->request($uri, array(
//     'privacy' => array(
//       'view' => 'password'
//     ),
//     'password' => 'helloworld'
//   ), 'PATCH');
  
// echo $uri . ' will now require a password to be viewed on Vimeo.';


## Set off-site privacy
// $client->request($uri . '/privacy/domains/example.com', 'PUT');
// $client->request($uri, array(
//   'privacy' => array(
//     'embed' => 'whitelist'
//   )
// ), 'PATCH');

// echo $uri . ' will only be embeddable on "http://example.com".';