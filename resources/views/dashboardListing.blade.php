@extends('afterlogtemplate')
@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">{{ \Lang::get('Dashboard') }}</h1>
    <div class="icon-bg ic-layers"></div>
  </div>
</div>
<!-- /.row --> 

<div class="row box-holder">
  <link href="{{asset("/public/bootgrid-master/dist/jquery.bootgrid.css")}}" rel="stylesheet" />
  <script src="{{asset("/public/bootgrid-master/demo/js/moderniz2.8.1.js")}}"></script>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-xs-12">
       <h2> Welcome {{$user_data['name']}}</h2>
      </div>
    </div>
  </div>
</div>
<script>
    $(function(){
        var color = ['primary','green','orange','red','purple','green2','blue2','yellow'];
        var pointer = 0;
        $('.panel').each(function(){
            if(pointer > color.length) pointer = 0;
            $(this).addClass('panel-'+color[pointer]);
            $(this).find('.pull-right .add').addClass('panel-'+color[pointer]);
            pointer++;
        })
    })
</script> 

@stop 