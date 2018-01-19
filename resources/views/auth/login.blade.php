@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <div>
                            <h2 class="text-left"><b>&nbsp;&nbsp;{!! $title or 'LOGIN' !!}</b></h2><hr>
                            <form class="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                 <label for="email" class="col-md-4 control-label">E-Mail Address</label>
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
                                    <label for="password" class="col-md-4 control-label">Password</label>
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
                                        <button type="submit" class="btn btn-primary btn-md">
                                            Start Your Session
                                        </button><br>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <br><br>
@stop

@section('style')
    {{--include external css here if you neeed--}}
    <style>
        #footer-test{
            position: fixed;
        }

        strong{
            color: red;
        }
    </style>
@stop
@section('script')
    {{--include external js here if you neeed--}}
    <script>

    </script>
@stop


