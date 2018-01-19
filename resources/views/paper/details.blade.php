@extends('layouts.default')
@section('content')



    <section class="blog section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                    <!-- Article 01 -->
                    <article>
                        <!-- Post Title -->
                        <h2>{!! $paper->paper_title !!}</h2>
                        <ul class="list-inline">
                            <li class="list-inline-item">by
                            @foreach($paper->users as $user)
                                <a style="color: #00aced" target="_blank" href="{!! route('profile.userProfile',$user->user_meta_data) !!}">
                                    {!! $user->name !!}
                                </a>,&nbsp;
                            @endforeach
                            </li>
                            <br>
                            <li class="list-inline-item">{!! $paper->created_at->formatLocalized('%A %d %B %Y'); !!}</li>
                        </ul>

                        <em>
                            @foreach($paper->categories as $category)
                                <a href="{!! route('paper.categoryWisePaper',$category->cat_meta_data) !!}" class="tag">
                                   <b> {!! $category->cat_name !!}</b>
                                </a>
                            @endforeach
                        </em><br>

                        <!-- Post Description -->
                        <h6 class=""><b>Abstract:</b><br>{!! $paper->paper_abstract !!}</h6><br>
                        <h6 class=""><b>Conference Name: &nbsp;</b><br>{!! $paper->paper_published_at !!}</h6><br>
                        <h6 class=""><b>Published Date: &nbsp;</b><br>{!! $paper->paper_publish_date !!}</h6>
                        @if(Auth::user())
                            <h6 class=""><b>Download File: &nbsp;</b>
                                <a href="{!! asset($paper->paper_pdf) !!}">
                                    <i class="fa fa-cloud-download fa-3x" aria-hidden="true"></i>
                                </a>
                            </h6>
                        @endif
                        <br><h6 class=""><b>Cite:</b></h6>
                        <div class="w3-panel w3-leftbar w3-light-grey">
                                <i><br>
                                    @if($paper->paper_cite)
                                       <p> "{!! $paper->paper_cite !!}"</p>
                                    @else
                                        "No Information Found."
                                    @endif
                                </i>
                        </div>
                        <!-- Read more button -->
                    </article>
                </div>




                <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
                    <div class="sidebar">
                        <form class="form" method="GET" action="{{ route('paper.paperSearch') }}">
                        <!-- Search Widget -->
                        <div class="widget search p-0">
                            <div class="input-group">
                                <input type="text"  name="paper_title" class="form-control" id="expire" placeholder="Search...">
                                <button type="submit" class="input-group-addon"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                        <!-- Category Widget -->
                        <div class="widget category">
                            <!-- Widget Header -->
                            <h5 class="widget-header">Categories</h5>
                            <ul class="category-list">
                                @foreach($categories as $category)
                                <li>
                                    <a href="{!! route('paper.categoryWisePaper',$category->cat_meta_data) !!}">
                                        {!! $category->cat_name !!} <span class="float-right">({!! $category->papers()->count() !!})</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Archive Widget -->
                        <div class="widget archive">
                            <!-- Widget Header -->
                            <h5 class="widget-header">Archives</h5>
                            <ul class="archive-list">
                                @foreach($archives as $archive)
                                <li><a href="{!! route('paper.archivedPaper',[$archive->month,$archive->year]) !!}">
                                        {!! $archive->month_name !!} &nbsp; {!! $archive->year !!} ({!! $archive->paper_count !!})
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@stop
@section('style')
    {{--include external css here if you neeed--}}
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>


        .tags {
            list-style: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        .tags li {
            float: left;
        }

        .tag {
            background: #eee;
            border-radius: 3px 0 0 3px;
            color: #999;
            display: inline-block;
            height: 26px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;
        }

        .tag::before {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }

        .tag::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .tag:hover {
            background-color: crimson;
            color: white;
        }

        .tag:hover::after {
            border-left-color: crimson;
        }
    </style>
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop
