@extends('layouts.default')
@section('content')

    <section>
        <div class="container">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0" style="margin: 0 auto;">
                <!-- Edit Personal Info -->
                <div class="widget personal-info">
                    <h3 class="widget-header user">Let's Complete Your Profile</h3>
                    <form role="form" method="POST" action="{{ route('profile.index') }}">
                        <!-- File chooser -->
                        <div class="form-group choose-file">
                            <i class="fa fa-user text-center"></i>
                            <input type="file" class="form-control-file d-inline" id="profile-pic">
                        </div>
                        <!-- First Name -->
                        <div class="form-group">
                            <label for="first-name">Full Name</label>
                            <input type="text" class="form-control" id="full-name" required="true">
                        </div>
                        <!-- Comunity Name -->
                        <div class="form-group">
                            <label for="comunity-name">Batch</label>
                            <input type="text" class="form-control" id="batch" required="true">
                        </div>

                        <div class="form-group">
                            <label for="first-name">Registration Number</label>
                            <input type="text" class="form-control" id="reg-num" required="true">
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last-name">Email Address</label>
                            <input type="text" class="form-control" id="email-addr" required="true">
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label for="last-name">Phone Number</label>
                            <input type="text" class="form-control" id="phone" required="true">
                        </div>
                        <!-- Checkbox -->
                        <!-- <div class="form-check">
                          <label class="form-check-label" for="hide-profile">
                            <input class="form-check-input" type="checkbox" value="" id="hide-profile">
                            Hide Profile from Public/Comunity
                          </label>
                        </div> -->
                        <!-- Zip Code -->
                        <!-- <div class="form-group">
                            <label for="zip-code">Zip Code</label>
                            <input type="text" class="form-control" id="zip-code">
                        </div> -->
                        <!-- Submit button -->
                        <button class="btn btn-transparent" href="{{ route('profile.index') }}" style="background-color: #008B8B; color: #fff;">Save My Information</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
@section('style')
    {{--include external css here if you neeed--}}
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop





