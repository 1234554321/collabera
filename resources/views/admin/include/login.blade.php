<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin">
    <meta name="author" content="">
    <meta name="keyword" content="Dashboard">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->    
    {!!HTML::style('css/bootstrap.min.css')!!}
    <!-- bootstrap theme -->
    {!!HTML::style('css/bootstrap-theme.css')!!}
    <!--external css-->
    <!-- font icon -->
     {!!HTML::style('css/elegant-icons-style.css')!!}
      {!!HTML::style('css/font-awesome.css')!!}
    <!-- Custom styles -->
     {!!HTML::style('css/style.css')!!}
      {!!HTML::style('css/style-responsive.css')!!}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
  <body class="login-img3-body">
    <div class="container">
        @include('admin.partials.errors')
      <form class="login-form" action="{{ url('/login') }}" method="POST" id="adminloginform" name="adminloginform">  
            <input type="hidden" name="_token" value="{{ csrf_token() }}">      
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="login" id="login" class="form-control" placeholder="Username / email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <!--<label class="checkbox">
                <input type="checkbox" name="remember" > Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>-->
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            <!--<button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>-->
        </div>
      </form>
    </div>
   {!!HTML::script('js/jquery.js')!!}
    <!-- jquery validate js -->
    {!!HTML::script('js/jquery.validate.min.js')!!}
    {!!HTML::script('js/form-validation-script.js')!!}
  </body>
</html>