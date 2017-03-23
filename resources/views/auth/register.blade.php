<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin">
    <meta name="author" content="">
    <meta name="keyword" content="Dashboard">
    <link rel="shortcut icon" href="img/favicon.png">
   
    <title>Registration Page</title>

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
              @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
      <form class="login-form" action="{{ url('/register') }}" method="POST" id="registrationform" name="registrationform">  
            <input type="hidden" name="_token" value="{{ csrf_token() }}">      
        <div class="login-wrap">
             <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="username" id="username" class="form-control" placeholder="User Name" autofocus>
            </div>
             <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" autofocus>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="email" id="email" class="form-control" placeholder="Email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
       <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="confirm password">
            </div>
            <button class="btn btn-primary btn-lg btn-block" type="submit">registration</button>
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
