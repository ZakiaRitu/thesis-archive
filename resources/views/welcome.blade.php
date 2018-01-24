<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    <link href="{!!  asset('asset_new/fonts/profession/style.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!!  asset('asset_new/libraries/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!!  asset('asset_new/libraries/bootstrap-select/css/bootstrap-select.min.css') !!}" rel="stylesheet" type="text/css">

    <!-- Toastr style -->
    {!! Html::style('assets/toastr/toastr.min.css') !!}
    <link href="{!!  asset('asset_new/css/profession-black-green.css') !!}" rel="stylesheet" type="text/css" id="style-primary">

    <link rel="shortcut icon" type="image/x-icon" href="{!!  asset("img/favicon.ico") !!}" rel="shortcut icon">
    <title>{!! $title or App\ProjectSettings\Setting::$projectName !!}</title>
    <style>
        .searchBox {
            -webkit-appearance: none;
            border-radius: 3px;
            border: 1px solid #e6e6e6;
            box-shadow: none;
            color: #363636;
            height: 54px;
        }

        .header-dark .header-top {
            background-color: #363839; !important;
        }

        .hero-content h1 {
            font-size: 36px;
            font-family: fantasy;
            font-weight: bold;
            line-height: 61px;
            margin: 0px 0px 13px 15px;
        }
        .hero-content h4 {
            font-family: fantasy;
            margin: 0px 0px 13px 15px;
        }
        .footer-bottom {
            background-color: #363839;
            color: #777;
            font-size: 12px;
            padding: 21px 0px;
        }

        .header-top {
            padding: 13px 0px;
            position: relative;

        }

        .nav-pills > li + li {
            margin-left: 5px;
        }

        .img-circle{
            margin: -3px;
            border: 2px solid white;
            height: 30px;
            -webkit-border-radius: 500px;
            -moz-border-radius: 500px;
        }


        @media (max-width: 767px){
            .nav-pills.header-nav li a {
                border-radius: 0px;
                color: #363636;
                display: block;
                padding: 14px 150px;
            }
        }

        @media (min-width: 768px) {
            .header-nav li {
                margin: 2px -7px 0px 0px;
                padding-bottom: 14px;
                padding-top: 14px;
                position: relative;
            }
        }
    </style>
</head>
<body class="hero-content-dark footer-dark navigation-dark header-dark">
<div class="page-wrapper">
    <div class="header-wrapper">
        <div class="header">
            <div class="header-top">
                <div class="container">
                    <div class="header-brand">
                        <div class="header-logo">
                            <a href="#">
                                <img src="{!! asset('img/favicon.png') !!}">
                                <span class="header-logo-text"><span class="header-logo-highlight">Thesis Archive</span></span>
                            </a>
                        </div>
                        <!-- /.header-logo-->
                        <div class="header-slogan">
                            <span class="header-slogan-slash"></span>
                            <span class="header-slogan-text"></span>
                        </div>
                        <!-- /.header-slogan-->
                    </div>
                    <!-- /.header-brand -->
                    <ul class="header-nav nav nav-pills collapse">

                       @if(! Auth::check())
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        @else
                            <li><a href="#"></a></li>
                        @endif

                        <li class="active">
                            <a href="/">Home</a>
                        </li>

                        <li>
                            <a href="{{ route('archive') }}">Archive</a>
                        </li>

                        <li >
                            <a href="#">Published Papers <i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{!! route('paper.conference') !!}">CONFERENCE</a></li>
                                <li><a href="{!! route('paper.journal') !!}">JOURNAL</a></li>
                            </ul>
                        </li>

                        <li >
                            <a href="#">Members <i class="fa fa-chevron-down"></i></a>
                            <ul class="sub-menu">
                                <li><a href="{!! route('user.faculty') !!}">FACULTY</a></li>
                                <li><a href="{!! route('user.members') !!}">OTHERS</a></li>
                            </ul>
                        </li>

                        @if(Auth::user())
                        <li >
                            <a href="#">
                                <img class="img-circle" src="{!! Auth::user()->profile->image !!}">
                                <i class="fa fa-chevron-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <a href="{{ route('profile.index') }}">Profile</a>
                                @if(Auth::user()->profile->is_admin == 'YES')
                                    <hr>
                                    <a  href="{{ route('paper.allPaper') }}">Paper Section</a>
                                    <a  href="{{ route('category.index') }}">Category Section</a>
                                    <a  href="{{ route('teacher.create') }}">Faculty Section</a>
                                    <a  href="{{ route('admin.user.allUser') }}">Users Section</a>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>

                    @if(Auth::user())
                        <ul class="header-actions nav nav-pills">
                            <li><a href="{!! route('paper.create') !!}" class="primary"> Add Paper </a></li>
                            <li><a href="{{ route('logout') }}" class="primary"> Logout </a></li>
                        </ul>
                    @else
                        <ul class="header-actions nav nav-pills">
                            <li><a href="{!! url('/login') !!}" class="primary"> Login </a></li>
                            <li><a href="{!! url('/register') !!}" class="primary"> Register </a></li>
                        </ul>
                    @endif

                    <!-- /.header-actions -->
                    <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.header-top -->
        </div>
        <!-- /.header -->
    </div>
    <!-- /.header-wrapper-->
    <div class="main-wrapper">
        <div class="main">
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <h1>SUST CSE Thesis Archive</h1>
                            <h4>
                                Vivamus congue rhoncus sem et placerat. Fusce nec nunc lobortis lorem ultrices facilisis.
                                Ut dapibus blandit nunc, et consectetur dui.
                            </h4>
                            <br>
                            <div class="form-group col-sm-12">
                                <form class="form" method="GET" action="{{ route('paper.paperSearch') }}">
                                    <input type="text" name="paper_title"
                                           class="form-control searchBox"
                                           id="search" placeholder="Search paper by name, category, author ...">
                                    <!-- Search Button -->
                                    {{--<button class="btn btn-main" style="margin: 20px 150px; color: #000;">Search Paper</button>--}}
                                </form>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col-* -->
                        <div class="col-sm-6 col-md-5 col-md-offset-1">
                            <div class="hero-content-carousel">
                                <h2>Recent Thesises</h2>
                                <ul class="cycle-slideshow vertical"
                                    data-cycle-fx="carousel"
                                    data-cycle-slides="li"
                                    data-cycle-carousel-visible="7"
                                    data-cycle-carousel-vertical="true">
                                    @foreach($recentPapers as $recentPaper)
                                        <li>
                                            <a href="{!! route('paper.paperDetails',$recentPaper->paper_meta_data) !!}">
                                                {!! $recentPaper->paper_title !!}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{!! route('paper.paperSearch') !!}" class="hero-content-show-all">Show All</a>
                            </div>
                            <!-- /.hero-content-content -->
                        </div>
                        <!-- /.col-* -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.hero-content -->
            <div class="stats">
                <div class="container">
                    <div class="row">
                        <div class="stat-item col-sm-4" data-to="{!! \App\Paper::count() !!}">
                            <strong id="stat-item-1">0</strong>
                            <span>Total Papers</span>
                        </div>
                        <!-- /.col-* -->
                        <div class="stat-item col-sm-4" data-to="{!! \App\Category::count() !!}">
                            <strong id="stat-item-2">0</strong>
                            <span>Total Categories</span>
                        </div>
                        <!-- /.col-* -->
                        <div class="stat-item col-sm-4" data-to="{!! \App\User::count() !!}">
                            <strong id="stat-item-3">0</strong>
                            <span>Total Authors</span>
                        </div>
                        <!-- /.col-* -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.stats -->
            <div class="container">
                <div class="filter">
                    <h2>Search With Category</h2>
                    <div class="row">
                        <form class="form" method="GET" action="{{ route('paper.paperSearch') }}">
                            <div class="form-group">
                                <div class="form-group col-sm-5">
                                    {!! Form::text('paper_title', null, ['class'=>'form-control inputtext4',
                                    'id'=>'inputtext4', 'placeholder' => 'Search paper by name, author ...'])  !!}
                                </div>
                                <div class="form-group col-sm-5">
                                    {!! Form::select('paper_category', $categoryLists, null,
                                    ['class'=>'form-control', 'id'=>'inputCategory4', 'placeholder' => 'Select Category'])  !!}
                                </div>
                                <div class="form-group col-sm-2">
                                    <button type="submit" class="btn btn-block btn-secondary">Search</button>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </form>
                    </div>
                    <!-- /.row -->
                    <ul class="filter-list">
                        @foreach($categories as $category)
                            <li><a href="{!! route('paper.categoryWisePaper',$category->cat_meta_data) !!}">
                                    {!! ucwords( str_limit($category->cat_name,20)) !!}
                                    <span class="filter-list-count">
                           [ {!! \App\CategoryPaper::where('cat_id', $category->id)->count() !!}]
                           </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.filter -->
                <div class="panels-highlighted">
                    <div class="row">
                        <div class="panel-highlighted-wrapper col-sm-6">
                            <div class="panel-highlighted-inner panel-highlighted-secondary">
                                <h2>Submit Paper?</h2>
                                <p>
                                    Vivamus congue rhoncus sem et placerat. Fusce nec nunc lobortis lorem ultrices facilisis.
                                    Ut dapibus blandit nunc, et consectetur dui.
                                </p>
                                <a href="{!! route('paper.create') !!}" class="btn btn-white">Submit Paper</a>
                            </div>
                            <!-- /.panel-inner -->
                        </div>
                        <!-- /.panel-wrapper -->
                        <div class="panel-highlighted-wrapper col-sm-6">
                            <div class="panel-highlighted-inner panel-highlighted-primary panel">
                                <h2>Searching Paper?</h2>
                                <p>
                                    Vivamus congue rhoncus sem et placerat. Fusce nec nunc lobortis lorem ultrices facilisis.
                                    Ut dapibus blandit nunc, et consectetur dui.
                                </p>
                                <a href="{!! route('paper.paperSearch') !!}" class="btn btn-white">Search Paper</a>
                            </div>
                            <!-- /.panel-inner -->
                        </div>
                        <!-- /.panel-wrapper -->
                    </div>
                    <!-- /.row-->
                </div>
                <!-- /.panels -->
                <div class="block background-secondary fullwidth candidate-title">
                    <div class="page-title">
                        <h2>Top Contributor</h2>
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <p>
                                    Donec tincidunt felis quam, eu tempus purus finibus in. Curabitur hendrerit,
                                    odio in viverra interdum, lorem velit scelerisque ipsum, a sagittis ligula leo in dolor. Etiam vestibulum.
                                </p>
                            </div>
                            <!-- /.col-* -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.page-title -->
                </div>
                <!-- /.fullwidth -->
                <div class="row mt-60">
                    <div class="candidate-boxes">
                        @foreach($topUsers as $topUser)
                            <div class="col-sm-3 col-md-2">
                                <div class="candidate-box">
                                    <div class="candidate-box-image">
                                        <a href="{!! route('profile.userProfile',$topUser->user_meta_data) !!}">
                                            <img src="{!! asset($topUser->profile->image) !!}" alt="Peter Ruck">
                                        </a>
                                    </div>
                                    <!-- /.candidate-box-image -->
                                    <div class="candidate-box-content">
                                        <h2>{!! $topUser->name !!}</h2>
                                        <h3> Total <b>{!! \App\PaperUser::where('user_id', $topUser->id)->count() !!}</b> Papers</h3>
                                    </div>
                                    <!-- /.candidate-box-content -->
                                </div>
                                <!-- /.candidate-box -->
                            </div>
                            <!-- /.col-* -->
                        @endforeach
                    </div>
                    <!-- /.candidate-boxes -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.main -->
    </div>
    <!-- /.main-wrapper -->
    <div class="footer-wrapper">
        <div class="footer">
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-left">
                        <p>Copyright © {!! date('Y') !!}. All Rights Reserved by <strong style="color: #008B8B">CSE, SUST</strong></p>
                    </div>
                    <!-- /.footer-bottom-left -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.footer-bottom -->
        </div>
        <!-- /.footer -->
    </div>
    <!-- /.footer-wrapper -->
</div>
<!-- /.page-wrapper -->
<script type="text/javascript" src="{!! asset('asset_new/js/jquery.js') !!}"></script>
{!! Html::script('assets/toastr/toastr.min.js') !!}
@include('includes.toastr')
<script type="text/javascript" src="{!! asset('asset_new/js/jquery.ezmark.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/bootstrap-sass/javascripts/bootstrap/transition.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/bootstrap-fileinput/js/fileinput.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/bootstrap-select/js/bootstrap-select.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/bootstrap-wysiwyg/bootstrap-wysiwyg.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/cycle2/jquery.cycle2.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/cycle2/jquery.cycle2.carousel.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/libraries/countup/countup.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('asset_new/js/profession.js') !!}"></script>


</body>
</html>