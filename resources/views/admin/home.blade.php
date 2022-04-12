<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


{{-- @auth
{{ auth()->user() }}
@endauth --}}

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('img/about-01.jpg') }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>


    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button class="btn btn-primary" type="submit">logout</button>
    </form>

  </nav>

<ul class="sidebar-nav">

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('admin.home') }}" class="brand-link">
          {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">Admin Page</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> --}}
            <div class="info">
              {{--  <a href="#" class="d-block">{{ auth()->user()->name }}</a>  --}}
            </div>
          </div>


              {{--  <form method="get" action="{{ route('admin.user') }}">
                  @csrf
                  users
              </form>  --}}
              <div class="d-block">
                 <a class="btn btn-primary" href="{{ route('admin.users.index') }}">users</a>
              </div>
              <div class="d-block">
                  <a class="btn btn-primary" href="{{ route('admin.books.index') }}">books</a>
              </div>
              <div class="d-block">
                <a class="btn btn-primary" href="{{ route('admin.authors.index') }}">authors</a>
            </div>
            <div class="d-block">
                <a class="btn btn-primary" href="{{ route('admin.contacts.index') }}">contacts</a>
            </div>

                </div>
            </aside>
        </ul>
    </div>
</body>


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</html>








{{-- <body class="hold-transition sidebar-mini layout-fixed">
    <ul class="sidebar-nav">



        <li class="sidebar-item active">
            <a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link collapsed" >
                <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="btn btn-primary">users</span>
            </a>
            <ul id="dashboards" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item active"><a class="btn btn-primary" href="{{ route('admin.student') }}">student</a></li>
                <li class="sidebar-item"><a class="btn btn-primary" href="{{ route('admin.lecturer') }}">lecturer</a></li>
                <li class="sidebar-item"><a class="btn btn-primary" href="{{ route('admin.employer') }}">employer</a></li>
                <li class="sidebar-item"><a class="btn btn-primary" href="{{ route('admin.guest') }}">guest</a></li>
                <li class="sidebar-item"><a class="btn btn-primary" href="{{ route('admin.institution') }}">institution</a></li>
                <li class="sidebar-item"><a class="btn btn-primary" href="{{ route('admin.partner') }}">partner</a></li>
            </ul>


        </li>

        <a class="btn btn-primary" href="{{ route('admin.contact') }}">contact</a>
        <a class="btn btn-primary" href="{{ route('admin.work') }}">work</a>
        <a class="btn btn-primary" href="{{ route('admin.freelance') }}">freelace</a>
        <a class="btn btn-primary" href="{{ route('admin.NewsSuggestion') }}">NewsSuggestions</a>
        <a class="btn btn-primary" href="{{ route('admin.facultets') }}">facultets</a>
        <a class="btn btn-primary" href="{{ route('admin.services') }}">services</a>

<form action="{{ route('admin.logout') }}" method="POST">
    @csrf
    <button class="btn btn-primary" type="submit">logout</button>
</form>



    </ul>
</body> --}}



