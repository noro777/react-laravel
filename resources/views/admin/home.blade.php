@extends('admin.layout')
@section('admin')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
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

@endsection
