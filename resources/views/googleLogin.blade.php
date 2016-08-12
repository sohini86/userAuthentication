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
<title>@yield('title','Google Login')</title>
<link href="{{asset("public/css/styles.css")}}" rel="stylesheet" type="text/css">
<link href="{{asset("public/font-icon/icomoon/style.css")}}" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<meta name="google-signin-client_id" content="{{\Config::get('settings.google_client_id')}}.apps.googleusercontent.com">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<script>
    function onSuccess(googleUser) {
        var profile = googleUser.getBasicProfile();
        gapi.client.load('plus', 'v1', function () {
            var request = gapi.client.plus.people.get({
                'userId': 'me'
            });
            //Display the user details
            request.execute(function (resp) {
                var profileHTML = '<div class="profile"><div class="head">Welcome '+resp.name.givenName+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></div>';
                profileHTML += '<img src="'+resp.image.url+'"/><div class="proDetails"><p>'+resp.displayName+'</p><p>'+resp.emails[0].value+'</p><p>'+resp.gender+'</p><p>'+resp.id+'</p></div></div>';
                $('.userContent').html(profileHTML);
                $('#gSignIn').slideUp('slow');
				$('.login-panel').slideUp('slow');
				
            });
        });
    }
    function onFailure(error) {
        alert(error);
    }
    function renderButton() {
        gapi.signin2.render('gSignIn', {
            'scope': 'profile email',
            'width': 240,
            'height': 50,
            'longtitle': true,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
        });
    }
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            $('.userContent').html('');
            $('#gSignIn').slideDown('slow');
			$('.login-panel').slideDown('slow');
        });
    }
</script>
</head>
<body class="loginbk">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="mes-box "> </div>
      <div class="login-panel panel panel-default animated fadeInDown">

        <div class="panel-heading">
          <h3 class="panel-title">Please Login</h3>
        </div>
        <div class="panel-body">
        <div class="logo-holder">  </div>
		
			<!-- HTML for render Google Sign-In button -->
			<div id="gSignIn"></div>
			<!-- HTML for displaying user details -->
			
			<p></p>
			<p class="btn btn-lg btn-success btn-block btn-ln"><a href="{{url('/')}}">Back to Login</a></p>
		  
        </fieldset>
      </div>
    </div>
	<div class="userContent"></div>
  </div>
</div>
<style>
.profile{
    border: 3px solid #B7B7B7;
    padding: 10px;
    margin-top: 10px;
    width: 350px;
    background-color: #F7F7F7;
    height: 160px;
}
.profile p{margin: 0px 0px 10px 0px;}
.head{margin-bottom: 10px;}
.head a{float: right;}
.profile img{width: 100px;float: left;margin: 0px 10px 10px 0px;}
.proDetails{float: left;}
</style>
</body>
</html>