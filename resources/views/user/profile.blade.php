@extends('layouts.default')
@section('content')


<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">

			<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							@include('user.photo-upload')
						</div><hr>
						<!-- User Name -->
						<h5 class="text-center" style="color: #008B8B">{{ $user->name or '' }}</h5>
						<p style="color: #008B8B">
							<strong>
								@if($user->profile->status == 'STUDENT')
									Session: {!! $user->profile->session !!}
								@endif
							</strong>
						</p>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
						<li class="active" ><a href=""><i class="fa fa-user"></i>About Me</a></li>
							<li><a href=""><i class="fa fa-user"></i> My Papers</a></li>
							<li><a  href="{{ route('logout') }}"><i class="fa fa-key"></i>Logout</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				@if(Auth::user()->id == $user->id)
					@include('user.edit-profile')
				@else
					@include('user.show-profile')
				@endif
			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>

@stop
@section('style')
    {{--include external css here if you neeed--}}
	<link href="{!! asset('css/photo_upload.css') !!}" rel="stylesheet">



@stop
@section('script')
   {{--include external js here if you neeed--}}
   <script src="{!! asset('js/photo_upload.js') !!}"></script>
@stop




