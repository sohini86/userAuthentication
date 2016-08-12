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
<title>@yield('title')</title>
<!-- compiled styles -->

<link href="{{asset("public/css/styles.css")}}" rel="stylesheet" type="text/css">
<link href="{{asset("public/font-icon/icomoon/style.css")}}" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>

<!-- jQuery Version 1.11.0 -->
<script src="{{asset("public/js/jquery-1.11.0.js")}}"></script>
</head>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<body class="dashboard">
<div id="wrapper"> 
  
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-static-top " role="navigation" style="margin-bottom: 0" id="sidebar-wrapper"> 
    
    <!-- /.navbar-header -->
    
    
    <!-- /.navbar-top-links -->
    
 
       <div class="navbar-default sidebar " role="navigation">
                <div class="ysgsidebar-nav">
                
        <div  class="logos-areea clearfix"><a class="logo" href="#"> 
          <!-- mini logo for sidebar mini 50x50 pixels --> 
          
          <!-- logo for regular state and mobile devices --> 
          Logo Image </a></div>
        <div  class="clearfix big-bor">
          <div class="grav">User Image</div>
          <div class="user-info center">{{Auth::user()->first_name.' '.Auth::user()->last_name}}</div>
        </div>
        <ul class="nav" id="side-menu">
       
          <li class="{{ (Request::segment(1) == 'dashboard' ) ? 'active' : '' }}"> <a  href="{{ url('/dashboard') }}" ><i class="fa fa-list"></i> Dashboard</a> </li>
          
		</ul>
      </div>
    </div>
    <!-- /.navbar-static-side --> 
  </nav>
  <div id="page-wrapper"> 
    
    <!-- Menu Bar -->
    <div class="row">
      <div class="col-xs-12 text-a top-icon-bar"> <a href="#menu-toggle" class="btn btn-danger active pull-left" id="menu-toggle"><i class="fa  fa-chevron-left"></i> </a>
        <div class="btn-group" role="group" aria-label="...">
       
          <a href="{{url('logout')}}" type="button" class="btn btn-default main-link">{{ Lang::get('logout') }}<span class="icon  ic-switch fl-right"></span></a> </div>
      </div>
    </div>
    @yield('content') </div>
</div>
<!-- /#page-wrapper -->

</div>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script> 

<!-- /#wrapper --> 

<!-- Bootstrap Core JavaScript --> 
<script src="{{asset("public/js/bootstrap.min.js")}}"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="{{asset("public/js/plugins/metisMenu/metisMenu.min.js")}}"></script> 

<!-- Custom Theme JavaScript --> 
<script src="{{asset("public/js/sb-admin-2.js")}}"></script>
</body>
</html>
