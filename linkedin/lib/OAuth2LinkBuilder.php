<?php

class Oauth2LinkBuilder {
   protected $uriParams = array();

   public function __construct() {
        $this->put('response_type', 'code');
	$this->put('state', time().mt_rand(111, 999));
   }

   public function put($key, $value) {
        $this->uriParams[] = $key .'='. rawurlencode($value);
	return $this;
   }

   public function build() {
      return 'https://www.linkedin.com/oauth/v2/authorization?'. implode('&', $this->uriParams);
   }
}
