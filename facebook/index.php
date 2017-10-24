<?php 
   require_once './../bootstrap.php';
   requireEnv(['FACEBOOK_APP_ID', 'FACEBOOK_SECRET', 'FACEBOOK_API_VERSION' ]);
?>
<!doctype html>
<html>
<title>Facebook Login Test</title>
<body>
<h1>Please open console</h1>

<script>
  /*
   This function is called FB SDK loads itself
   */
  window.fbAsyncInit = function() {
    console.log('fbAsyncInit');
    FB.init({
      appId            : '<?php echo getenv('FACEBOOK_APP_ID') ?>',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : '<?php echo getenv('FACEBOOK_API_VERSION') ?>',
    });
    FB.AppEvents.logPageView();
    checkLoginState();
  }
 
  function onSuccess(authResponse) { 
    fetch('https://graph.facebook.com/' + authResponse.userID + '?access_token=' + authResponse.accessToken)
	.then(response => response.json())
	.then(json => console.warn(json));
  }

  /*
    This is the callback. It calls FB.getLoginStatus() to get the most recent login state. 
  */
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
    /*
    response.status specifies the login status of the person using the app. The status can be one of the following:
      'connected'      - the person is logged into Facebook, and has logged into your app.
      'not_authorized' - the person is logged into Facebook, but has not logged into your app.
      'unknown'        - the person is not logged into Facebook, so you don't know if they've logged into your app 
                         or FB.logout() was called before and therefore, it cannot connect to Facebook.

    response.authResponse is included if the status is connected and is made up of the following:
      'accessToken'   - contains an access token for the person using the app.
      'expiresIn'     - indicates the UNIX time when the token expires and needs to be renewed.
      'signedRequest' - a signed parameter that contains information about the person using the app.
      'userID'        - the ID of the person using the app.

    Once your app knows the login status of the person using it, it can do one of the following:
      * If the person is logged into Facebook and your app, redirect them to your app's logged in experience.
      * If the person isn't logged into your app, or isn't logged into Facebook, prompt them with the Login dialog with FB.login() or show them the Login Button.
    */

     console.log('getLoginStatus', response.status, response.authResponse);
     if (response.status === 'connected') {     
	console.warn('Logged in.'); 
        onSuccess(response.authResponse);
        document.getElementsByClassName("fb-login-button")[0].style.display = "none";
     } else { 
	console.info('FB.login'); 
        FB.login(checkLoginState, { scope: 'public_profile' }); 
     }
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
    
<!-- 
Including the Login Button into your page is easy. 
Visit the documentation for the login button 
https://developers.facebook.com/docs/plugins/login-button

and set the button up the way you want. 
Then click Get Code and it will show you the code you need to display the button on your page.
-->
<div 
  class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" 
  data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false"
  onlogin="checkLoginState();" data-scope="public_profile"
>
</div>

</body>
</html>