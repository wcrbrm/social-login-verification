<?php

require_once './../bootstrap.php';
requireEnv(['LINKEDIN_CLIENT_ID', 'LINKEDIN_OAUTH2_REDIRECT_URL' ]);

require_once './lib/OAuth2LinkBuilder.php';
require_once './lib/OAuth2Scope.php';

$link = new OAuth2LinkBuilder();
$link->put('client_id', getenv('LINKEDIN_CLIENT_ID'));
$link->put('redirect_uri', getenv('LINKEDIN_OAUTH2_REDIRECT_URL'));
$link->put('scope', OAuth2Scope::BASIC_PROFILE ); // scopes: r_basicprofile r_emailaddress rw_company_admin w_share

die($link->build());

header('Location: '. $link->build() );

