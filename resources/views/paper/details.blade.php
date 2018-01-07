@extends('layouts.default')
@section('content')



    <section class="blog section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
                    <!-- Article 01 -->
                    <article>
                        <!-- Post Title -->
                        <h3>{!! $paper->paper_title !!}</h3>
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

                        Categories:
                        <em>
                            @foreach($paper->categories as $category)
                                <a style="color:yellowgreen" target="_blank" href="{!! route('paper.categoryWisePaper',$category->cat_meta_data) !!}">
                                    {!! $category->cat_name !!}
                                </a>,&nbsp;
                            @endforeach
                        </em><br>

                        <!-- Post Description -->
                        <p class=""><b><em>Abstract: &nbsp;</em></b><br>{!! $paper->paper_abstract !!}</p>
                        <p class=""><b>Conference Name: &nbsp;</b><br>{!! $paper->paper_published_at !!}</p>
                        <p class=""><b>Published Date: &nbsp;</b><br>{!! $paper->paper_publish_date !!}</p>
                        <p class=""><b>Download File: &nbsp;</b><br>{!! link_to_asset($paper->paper_pdf) !!}</p>

                        <p class=""><b>Cite: &nbsp;</b><br> </p>
                        <div class="w3-panel w3-leftbar w3-light-grey">
                            <p class="w3-xlarge w3-serif">
                                <i><br>
                                    @if($paper->paper_cite)
                                        "{!! $paper->paper_cite !!}"
                                    @else
                                        "No Information Found."
                                    @endif
                                </i>
                            </p>
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

    </style>
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop
