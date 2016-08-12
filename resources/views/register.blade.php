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
<title>@yield('title','Register')</title>
<!-- compiled styles -->

<link href="{{asset("public/css/styles.css")}}" rel="stylesheet" type="text/css">
<link href="{{asset("public/font-icon/icomoon/style.css")}}" rel="stylesheet" type="text/css">

<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<!-- jQuery Version 1.11.0 -->
<script src="{{asset("public/js/jquery-1.11.0.js")}}"></script>
</head>

<body class="loginbk">
<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="mes-box "> </div>
      <div class="login-panel panel panel-default animated fadeInDown">
        <div class="flash-message"> @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <br>
            @if($errors->has())
            @foreach ($errors->all() as $error)             
            {{ $error }} <br>
            @endforeach
            @endif </p>
          @endif
          @endforeach </div>
        <div class="panel-heading">
          <h3 class="panel-title">Please Register</h3>
        </div>
        <div class="panel-body">
        <div class="logo-holder">  </div>
        {!! Form::open(array('url' => 'registerSubmit')) !!}
        <fieldset>
		   <div class="form-group"> {!! Form::text('name', '', array('placeholder' => 'name' ,'class' => 'form-control')) !!} </div>
          <div class="form-group"> {!! Form::text('email', '', array('placeholder' => 'email' ,'class' => 'form-control')) !!} </div>
          <div class="form-group"> {!! Form::input('password', 'password', '', array('placeholder' => 'password','class' => 'form-control')) !!}</div>
    
          <div class="form-group">{!! Form::submit('Register',array('class' => 'btn btn-lg btn-success btn-block')) !!}</div>
          {!! Form::close() !!}
          </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
<!-- /#wrapper --> 

<!-- Bootstrap Core JavaScript --> 
<script src="{{asset("public/js/bootstrap.min.js")}}"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="{{asset("public/js/plugins/metisMenu/metisMenu.min.js")}}"></script> 

<!-- Custom Theme JavaScript --> 
<script src="{{asset("public/js/sb-admin-2.js")}}"></script>
</body>
</html>
