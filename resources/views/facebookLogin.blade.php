<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="_token" content="{!! csrf_token() !!}"/>
<title>@yield('title','Facebook Login')</title>
<link href="{{asset("public/css/styles.css")}}" rel="stylesheet" type="text/css">
<link href="{{asset("public/font-icon/icomoon/style.css")}}" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>


</head>
<body class="loginbk">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="mes-box "> </div>
      <div id="before_login" class="login-panel panel panel-default animated fadeInDown">

        <div class="panel-heading">
          <h3 class="panel-title">Please Login</h3>
        </div>
        <div class="panel-body">
        <div class="logo-holder">  </div>
		
			<p class="btn btn-lg btn-success btn-block btn-ln"><a href="javascript:void(0)" id="loginBtn">Facebook login</a></p>
			<p></p>
			<p class="btn btn-lg btn-success btn-block btn-ln"><a href="{{url('/')}}">Back to Login</a></p>
		  
        </fieldset>
      </div>
    </div>
	<div id="after_login" style="display:none;" class="login-panel panel panel-default animated fadeInDown">
	<div class="panel-heading">
         <div id="userContent"></div>
        </div>
	
	<p class="btn btn-lg btn-success btn-block btn-ln"><a href="{{url('/')}}" id="logoutBtn" onclick="javascript:logout();">Logout</a></p>
	</div>
  </div>
</div>
<script>

function getUserData() {
    FB.api('/me', function(response) {
        document.getElementById('after_login').style.display = 'block';
		document.getElementById('before_login').style.display = 'none';
        document.getElementById('userContent').innerHTML = 'Welcome ' + response.name;
    });
}
  function logout() {
            FB.logout(function(response) {
               document.getElementById('after_login').style.display = 'none';
			   document.getElementById('before_login').style.display = 'block';
              document.getElementById('userContent').innerHTML = '';
            });
        }

window.fbAsyncInit = function() {
    //SDK loaded, initialize it
    FB.init({
        appId      : '{{\Config::get("settings.facebook_app_id")}}',
        xfbml      : true,
        version    : 'v2.2'
    });

    //check user session and refresh it
    FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
            //user is authorized
            document.getElementById('loginBtn').style.display = 'none';
            document.getElementById('logoutBtn').style.display = 'block';
            getUserData();
        } else {
            //user is not authorized
        }
    });
};

//load the JavaScript SDK
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

//add event listener to login button
document.getElementById('loginBtn').addEventListener('click', function() {
    //do the login
    FB.login(function(response) {
        if (response.authResponse) {
            //user just authorized your app
            document.getElementById('loginBtn').style.display = 'none';
            getUserData();
        }
    }, {scope: 'email,public_profile', return_scopes: true});
}, false);
</script>
</body>
</html>