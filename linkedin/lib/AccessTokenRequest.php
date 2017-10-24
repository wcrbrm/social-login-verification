<?php

/*

POST /oauth/v2/accessToken HTTP/1.1
Host: www.linkedin.com
Content-Type: application/x-www-form-urlencoded

grant_type=authorization_code&code=987654321&redirect_uri=https%3A%2F%2Fwww.myapp.com%2Fauth%2Flinkedin&client_id=123456789&client_secret=shhdonottell

*/

class AccessTokenRequest {

   protected $uriParams = array();

   public function __construct() {
        $this->put('grant_type', 'authorization_code');
   }

   public function put($key, $value) {
        $this->uriParams[] = $key .'='. rawurlencode($value);
	return $this;
   }

   public function setCode( $code ) { return $this->put('code', $code); }
   public function setRedirectUri( $code ) { return $this->put('code', $code); }
   public function setClientId( $code ) { return $this->put('code', $clientId); }
   public function setClientSecret( $code ) { return $this->put('client_secret', $clientSecret); }


   public function build() {
      // required: code, redirect_uri, client_id, client_secret
      return implode('&', $this->uriParams);
   }

}