<?php

require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

function requireEnv($vars) {
  $missing = [];
  foreach ($vars as $key) {
     if (!getenv($key)) {
	array_push( $missing, $key );		
     }
  }
  if (count($missing)) {
     die('ERROR: Missing environment setup '. implode(', ', $missing));
  }
}

function err($code, $reason) {
  $out = array( 'code' => $code, 'message' => $reason );
  if (PHP_SAPI !== 'cli') header( 'Content-Type: application/json' );  
  die(json_encode($out));
}

function json($out) {
  if (PHP_SAPI !== 'cli') header( 'Content-Type: application/json' );  
  die(json_encode($out));
}