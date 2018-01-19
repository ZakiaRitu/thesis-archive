@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <div>
                            <h2 class="text-left"><b>&nbsp;&nbsp;{!! $title or 'REGISTRATION' !!}</b></h2><hr>

                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                   <label for="first_name" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                                               placeholder="First Name" required>
                                        @if ($errors->has('first_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('first_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name" class="col-md-4 control-label">Name</label>
                                    <div class="col-md-6">
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                                               placeholder="Last Name" required>
                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                               placeholder="Email Address" required>
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
                                     <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                               placeholder="Confirm Password" required>
                                    </div>
                                </div>

                             <!--   <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Select Member Type</label>
                                    <div class="col-md-6">
                                        <select id="status" class="form-control" name="status" placeholder="Select Status" required>
                                            <option value="FACULTY">FACULTY</option>
                                            <option value="STUDENT">STUDENT/OTHERS</option>
                                        </select>
                                    </div>
                                </div><br> -->

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-info btn-md">
                                            Register
                                        </button><br>
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

    </style>
@stop
@section('script')
    {{--include external js here if you neeed--}}
    <script>

    </script>
@stop


{{--<div class="col-md-6">--}}
    {{--<div class="search-result bg-gray">--}}
        {{--zdfeesawt--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="col-md-6">--}}
    {{--<div class="search-result bg-gray">--}}
        {{--zdfeesawt--}}
    {{--</div>--}}
{{--</div>--}}