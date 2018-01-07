<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>{!! $title or 'Login' !!} | {!! \App\ProjectSettings\Setting::$projectName !!}</title>
      <link rel="stylesheet" href="{!! asset('css/style1.css') !!}">
      <link href="{!! asset('img/favicon.ico') !!}" rel="shortcut icon">
</head>

<body>
  <div class="wrapper">
    <div class="container">
        <h1>Welcome</h1>

        <form class="form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
             <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                 <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address"  required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
             </div>

             <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
             </div>



            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button><br>
                   <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
        </form>
    </div>

    <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
  <script src='{!! asset('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js') !!}'></script>

    <script src="{!! asset('js/index.js') !!}"></script>

</body>
</html>