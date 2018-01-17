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
									Session: {!! $user->profile->session_year !!}
								@endif
							</strong>

							<ul class="list-inline product-meta text-center">
								<li class="list-inline-item">
									<a href="#"><i class="fa fa-folder-open-o"></i>
										<b>
											{!! \App\PaperUser::where('user_id', $user->id)->count() !!}
										</b> Papers
									</a>
								</li><br>
								<li class="list-inline-item">
									<a href="#"><i class="fa fa-calendar"></i>
										Joined at : {!! $user->created_at->toDateString() !!}
									</a>
								</li>
							</ul>

						</p>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
						<li class="active" ><a href=""><i class="fa fa-user"></i>About Me</a></li>
							@if(Auth::user()->id == $user->id)
							<li><a href="{!! route('paper.index') !!}"><i class="fa fa-user"></i> My Papers</a></li>
							@else
								<li><a href="{!! route('paper.userWisePaper',$user->user_meta_data) !!}"><i class="fa fa-user"></i>
										{!! $user->name !!} Papers</a>
								</li>
						    @endif
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
	<style>
		.textarea.form-control {
			padding: 7px;
			height: 100px;
		}
	</style>
@stop
@section('script')
   {{--include external js here if you neeed--}}
   <script src="{!! asset('js/photo_upload.js') !!}"></script>
@stop




