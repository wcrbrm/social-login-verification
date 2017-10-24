<?php

require_once './../bootstrap.php';
requireEnv(['FACEBOOK_APP_ID', 'FACEBOOK_SECRET', 'FACEBOOK_API_VERSION' ]);

$fb = new \Facebook\Facebook([
  'app_id' => getenv('FACEBOOK_APP_ID'),
  'app_secret' => getenv('FACEBOOK_SECRET'),
  'default_graph_version' => getenv('FACEBOOK_API_VERSION')
]);

if (!isset($_REQUEST['data']) || !$_REQUEST['data']) { err('no_data', 'Missing data parameter'); }

try { 
  $signedRequest = $_REQUEST['data'];
  $sr = new \Facebook\SignedRequest($fb->getApp(), $signedRequest);
  json($sr->getPayload());
} catch( \Exception $e ) {
  err( 'error', $e->getMessage());
}
