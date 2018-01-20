<section style="background-color: #363839">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg  navigation">
                    <a class="navbar-brand" href="/">
                        <img src="{!! asset('img/favicon.png') !!}" class="navbar-brand" href="/">SUST CSE Thesis Archive
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="fa fa-bars"></i></span>
                    </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto main-nav ">
                                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                                    <a class="nav-link" href="/">Home</a>
                                </li>



                                <li class="nav-item  {{ Request::is('archive*')? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('archive') }}">
                                        Archive</a>
                                </li>


                                <li class="nav-item dropdown dropdown-slide {{ Request::is('papers*')? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Published Papers <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{!! route('paper.conference') !!}">CONFERENCE</a>
                                        <a class="dropdown-item" href="{!! route('paper.journal') !!}">JOURNAL</a>
                                    </div>
                                </li>



                                <li class="nav-item dropdown dropdown-slide {{ Request::is('faculty')|| Request::is('members') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Members <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{!! route('user.faculty') !!}">FACULTY</a>
                                        <a class="dropdown-item" href="{!! route('user.members') !!}">OTHERS</a>
                                    </div>
                                </li>



                            @if(Auth::user())
                                <li class="nav-item dropdown dropdown-slide {{ Request::is('profile')? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="{{route('profile.index')}}"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->first_name }} <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <!-- Dropdown list -->
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a>
                                       @if(Auth::user()->profile->is_admin == 'YES')
                                           <hr>
                                        <a class="dropdown-item" href="{{ route('paper.allPaper') }}">Paper Section</a>
                                        <a class="dropdown-item" href="{{ route('category.index') }}">Category Section</a>
                                        <a class="dropdown-item" href="{{ route('teacher.create') }}">Faculty Section</a>
                                        <a class="dropdown-item" href="{{ route('admin.user.allUser') }}">Users Section</a>
                                        @endif
                                    </div>
                                </li>
                                @endif

                            </ul>



                            @if(Auth::user())
                            <ul class="navbar-nav ml-auto mt-10">
                                @if(Auth::user()->is_approved == 'YES')
                                <li class="nav-item">
                                    <a class="nav-link login-button" style="color: #fff" href="{!! route('paper.create') !!}">Add Paper</a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link login-button" style="color: #fff" href="{{ route('logout') }}">Logout</a>
                                </li>
                            </ul>
                            @else
                            <ul class="navbar-nav ml-auto mt-10">
                                <li class="nav-item">
                                    <a class="nav-link login-button" style="color: #fff" href="{!! url('/login') !!}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link login-button" style="color: #fff" href="{!! url('/register') !!}">Register</a>
                                </li>
                            </ul>
                            @endif
                        </div>
                </nav>
            </div>
        </div>
    </div>
</section>