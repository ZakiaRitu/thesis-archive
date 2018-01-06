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
							<img src="images/anonymous.jpg" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center" style="color: #008B8B">{{ Auth::user()->name }}</h5>
						<p style="color: #008B8B"><strong>#### Batch</strong></p>
						
						<a href="{{ route('profile.edit') }}" class="btn btn-main-sm" style="background-color: #008B8B; color: #fff;">Add Information</a>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
						<li class="active" ><a href=""><i class="fa fa-user"></i>About Me</a></li>
							<li><a href=""><i class="fa fa-user"></i> My Papers</a></li>
							<!-- <li><a href=""><i class="fa fa-bookmark-o"></i> Favourite Ads <span>5</span></a></li>
							<li><a href=""><i class="fa fa-file-archive-o"></i>Archived Ads <span>12</span></a></li>
							<li><a href=""><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a></li> -->
							<li><a  href="{{ route('logout') }}"><i class="fa fa-key"></i>Logout</a></li>
							<li><a href="/"><i class="fa fa-power-off"></i>Delete Account</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-20 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header" style="color: #008B8B">About Me</h3>
					<p><strong style="color: #008B8B">Name:</strong><strong> null</strong></p>
					<p><strong style="color: #008B8B">Registration number:</strong><strong> null</strong></p>
					<p><strong style="color: #008B8B">Phone:</strong><strong> null</strong></p>
					<p><strong style="color: #008B8B">Email:</strong><strong> null</strong></p>
					<p><strong style="color: #008B8B">Field of interest:</strong><strong> null</strong></p>
				</div>
			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>

@stop
@section('style')
    {{--include external css here if you neeed--}}
@stop
@section('script')
   {{--include external js here if you neeed--}}
@stop




