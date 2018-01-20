@extends('layouts.default')
@section('content')


  @if(\Request::route()->getName() == 'paper.paperSearch')
    @include('paper.search')
  @endif

    <section class="section-sm">
        <div class="container">

            <div class="row">
                @if(count($papers)== 0)
                    <div class="col-md-12">
                        <div class="search-result bg-gray">
                            <h2 class="text-center">No Data Found</h2>
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="search-result bg-gray">

                        <h2 class="text-left"><b>&nbsp;&nbsp;{!! $title or ' ' !!}</b></h2>
                        @if(\Request::route()->getName() == 'paper.paperSearch')
                        <div class="col-md-12"  style="color: green">
                            @if( Request::get('paper_title'))
                                You Search For:
                                {{ Request::get('paper_title') }}
                            @endif
                                <br>
                            @if(Request::get('paper_category'))
                                Category Search:
                                {{ \App\Category::where('id',Request::get('paper_category'))->first()->cat_name }}
                            @endif
                            
                        </div>
                        @endif
                        <hr>



                        <div class="row mt-30">
                            @foreach($papers as $paper)
                                <div class="col-sm-12 col-lg-12 col-md-6">
                                    <!-- product card -->
                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">

                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-title">
                                                    <a href="{!! route('paper.paperDetails',$paper->paper_meta_data) !!}">
                                                        {!! $paper->paper_title !!}
                                                    </a><br>
                                                </h2>
                                                 <small>
                                                     @foreach($paper->users as $user)
                                                     <a style="color: #00aced" target="_blank"
                                                        href="{!! route('profile.userProfile',$user->user_meta_data) !!}">
                                                         {!! $user->name !!}
                                                     </a>,&nbsp;
                                                     @endforeach
                                                 </small><br>
                                                <small>
                                                    @foreach($paper->categories as $category)
                                                        <a class="tag" target="_blank"
                                                           href="{!! route('paper.categoryWisePaper',$category->cat_meta_data) !!}">
                                                            <b>{!! $category->cat_name !!}</b>
                                                        </a>
                                                    @endforeach
                                                </small>

                                                <p class="card-text ">
                                                {!! str_limit($paper->paper_abstract, 100) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="pagination justify-content-center">
                        <nav aria-label="Page navigation example">
                            {!! $papers->links('vendor.pagination.bootstrap-4') !!} <br>
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </section>

@stop
@section('style')
    {{--include external css here if you neeed--}}

    <style>
        select#inputCategory4 {
            border: 1px solid #fff;
            color: #d62170;
            height: 50px;
        }
        input#inputtext4{
            border: 1px solid #fff;
            color: #d62170;; !important;
        }
        .inputtext4{
            color: #d62170;; !important;
        }
    </style>
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


