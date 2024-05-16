<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{asset("css/adminlte.min.css")}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        {{--<a href="#"><b>Admin</b>Panel</a>--}}
    </div>
    <!-- /.login-logo -->
    <div class="login-card-body">

        @if(isset($message))
            <div class="alert alert-danger mt-3">
                {{$message}}
            </div>
        @endif
        <p class="login-card-msg text-center">
            <img src="{{setting("logo", asset("images/logo.png"))}}" style="height: 150px;width:150px">
        </p>

        <form action="{{route("login.submit")}}" method="post">
            @csrf
            <div class="form-group ">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign In</button>

        </form>


    </div>
    <!-- /.login-card-body -->
</div>

</body>
</html>
