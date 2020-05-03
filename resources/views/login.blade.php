<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="/asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="/asset/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/asset/css/animate.css" rel="stylesheet">
    <link href="/asset/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>

        <h3>Welcome to UBERTHON</h3>

        {{--    <p>Login in. To see it in action.</p>--}}
        @if(session('success'))

            <div class="alert alert-success">{{session('success')}}!</div>

        @endif
        @if(session('failed'))
            <div class="alert alert-danger">
                {{session('failed')}}!
            </div>
        @endif


        <form class="m-t" role="form" method="post" action="/login-check"
              enctype="multipart/form-data">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" required="" name="email">
                <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required="" name="password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="/">
                <small>Forgot password?</small>
            </a>
            <p class="text-muted text-center">
                <small>Do not have an account?</small>
            </p>
            {{--   <a class="btn btn-sm btn-white btn-block" href="/">Create an account</a>--}}
        </form>
        {{-- <p class="m-t">
             <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
         </p>--}}
    </div>
</div>

<!-- Mainly scripts -->
<script src="/asset/js/jquery-3.1.1.min.js"></script>
<script src="/asset/js/popper.min.js"></script>
<script src="/asset/js/bootstrap.js"></script>

</body>

</html>
