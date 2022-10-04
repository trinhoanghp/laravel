<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title')</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{url('/')}}/public/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/dist/css/adminlte.min.css">

  

  {{-- <link rel="stylesheet" href="public/plugins/font-awesome-4.7.0/css/font-awesome.min.css"> --}}
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
  @yield('css')
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
@include('admin.includes.header')
@include('admin.includes.sidebar')
<div class="content-wrapper">
  @if (Session::has('error'))
  <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     {{Session::get('error')}}
  </div>
  @endif
 
  @if (Session::has('success'))
  <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     {{Session::get('success')}}
  </div>
  @endif
<div  class="card-body">
  @yield('content')
</div>

</div>
@include('admin.includes.footer')
</div>

<script src="{{url('/')}}/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('/')}}/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('/')}}/public/dist/js/adminlte.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
@yield('js')
</body>
</html>
