<?php

require_once './../bootstrap.php';
requireEnv(['LINKEDIN_CLIENT_ID', 'LINKEDIN_CLIENT_SECRET' ]);

/*
  This script should be set as redirect_uri callback URL

  From: https://developer.linkedin.com/docs/oauth2#permissions

  code — The OAuth 2.0 authorization code.
      The code is a value that you will exchange with LinkedIn for an actual OAuth 2.0 access token 
     in the next step of the authentcation process.  For security reasons, the authorization code has a very short lifespan 
     and must be used within moments of receiving it - before it expires and you need to repeat all of the previous steps to request another.
  state — A value used to test for possible CSRF attacks.
        
  Before you accept the authorization code, your application should ensure that the value returned 
  in the state parameter matches the state value from your original authorization code request. 
  This ensures that you are dealing with the real original user and not a malicious script that 
  has somehow slipped into the middle of your authentication flow. 
  If the state values do not match, you are likely the victim of a CSRF attack and you 
  should throw an HTTP 401 error code in response.


  If the user choses to cancel, or the request fails for any other reason, their client will be redirected 
  back to your redirect_uri callback URL with the following additional query parameters appended:

  error - A code indicating the type of error. Two available strings are:
     * user_cancelled_login - The user refused to login into LinkedIn account.
     * user_cancelled_authorize - The user refused to authorize permissions request from your application.
  error_description - A URL-encoded textual description that summarizes error.

*/

http://localhost/social-login-verification/linkedin/callback.php?code=AQTEbfPuP8kdAfWphJaNan1wVovClGX-F7WKSWUTP3kQnVMAkHGDhZrzWc3CBGXptnYo7AEA92h7efzutsllgiCgU2n-QO62VkYyUOrlmd_0bcL86lNw7xZ-eQcjPedauYv5_eQV1vtTHqBm5sDd2aNIajegKQ&state=1508842324198

// code=AQTEbfPuP8kdAfWphJaNan1wVovClGX-F7WKSWUTP3kQnVMAkHGDhZrzWc3CBGXptnYo7AEA92h7efzutsllgiCgU2n-QO62VkYyUOrlmd_0bcL86lNw7xZ-eQcjPedauYv5_eQV1vtTHqBm5sDd2aNIajegKQ
// state=1508842324198

