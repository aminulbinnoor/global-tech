<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>{{ setting("title", "Dashboard") }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
  <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="icon" href="{{ setting("favicon", asset("images/logo.png")) }}"
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="dropdown user user-menu">
            <a href="#" data-toggle="dropdown" aria-expanded="false">
              <img src="{{$current_user->image}}" class="user-image" alt="User Image">
            </a>
            <ul class="dropdown-menu pt-3 pb-3" style="width:120px">
                <li>
                  <a class="dropdown-item" href="{{route("profile.show")}}">
                    <i class="fas fa-user-alt"></i>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{route("logout")}}">
                    <i class="fas fa-lock-open"></i>
                    <span>Log Out</span>
                  </a>
                </li>

            </ul>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route("dashboard") }}" class="brand-link">
      <img src="{{ setting("logo", asset("images/logo.png")) }}" 
           alt="{{ setting("title", "") }}" 
           class="brand-image elevation-3"
           style="width:60px;height:60px">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ $current_user->image }}" 
               class="img-circle elevation-2" alt="{{$current_user->name}}">
        </div>
        <div class="info">
          <a href="{{route("profile.show")}}" class="d-block">{{$current_user->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      @include('layout.sidebar.admin')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div id="app" class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
                @if(session()->has('success'))
                  <div class="alert alert-success mt-3">
                    <span class="glyphicon glyphicon-ok"></span>
                      {!! session('success') !!}
                      <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                @if(session()->has('error'))
                  <div class="alert alert-danger mt-3">
                    <span class="glyphicon glyphicon-ok"></span>
                      {!! session('error') !!}
                      <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                @yield('content')
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Version {{ setting("version") }}
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy </strong> {{ setting("copyright") }}
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<script src="{{asset("plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("js/adminlte.min.js")}}"></script>
<script src="{{asset("js/script.js")}}"></script>
</body>
</html>
