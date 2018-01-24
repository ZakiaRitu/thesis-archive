@extends('layouts.default')
@section('content')

<section class="hero-area  text-center test ">
    <!-- Container Start -->
    <div class="container ">
        <div class="row">
            <div class="col-md-12">  <br><br>
                <!-- Header Contetnt -->
                <h1><b>Thesis Archive</b></h1>

                <div class="short-popular-category-list text-center"></div>
                <div class="advance-search">
                    <form class="form" method="GET" action="{{ route('paper.paperSearch') }}">
                        <div class="row">

                            <!-- Store Search -->
                            <div class="col-lg-12 col-md-24">
                                <div class="block d-flex">
                                    <input type="text" name="paper_title"
                                           class="form-control mb-2 mr-sm-2 mb-sm-0"
                                           id="search" placeholder="Search paper by name, category, author ...">
                                    <!-- Search Button -->
                                    <button class="btn btn-main" style="background-color: #008B8B; color: #fff;">SEARCH</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Advance Search -->
            </div>
        </div>
    </div>
    <!-- Container End -->

    <div class="col-md-12" style="margin-top: 20%;">
        <div class="search-result bg-gray" style="border-radius: 10px;">
            <h1 class="text-center"><b>Archive Category</b></h1><hr>

            <div class="col-md-12">
                <div class="product-grid-list">
                    <div class="row mt-30">
                        @foreach($categories as $category)
                        <div class="col-sm-12 col-lg-4 col-md-6">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card" style="background: white">
                                    <div class="thumb-content">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-center">
                                            <a href="{!! route('paper.categoryWisePaper',$category->cat_meta_data) !!}">
                                                {!! ucwords( $category->cat_name) !!}
                                            </a><br>
                                        </h4>

                                        <ul class="list-inline product-meta text-center">
                                            <li class="list-inline-item">
                                                <a href="#"><i class="fa fa-folder-open-o"></i>
                                                    <b>
                                                        Total  {!! \App\CategoryPaper::where('cat_id', $category->id)->count() !!}
                                                    </b> Papers
                                                </a>
                                            </li><br>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <a href="{!! route('category.categoryList') !!}" class="btn btn-transparent">More Category...</a>

        </div>
    </div>
</section>

<br>
<br>
<br>
<br>

@stop
@section('style')
{{--include external css here if you neeed--}}

<style>
    /*#footer-test{*/
    /*position: fixed;*/
    /*}*/

    body{
        background-image: url({!! asset('img/background.png') !!});
    }
    b{
        font-family: cursive;
        font-variant: small-caps;
        font-weight: 900;
        font-size: larger;
    }

    .btn {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 5px 20px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: bold;
    }

    .btn:focus, .btn:hover {
        text-decoration: none;
        border-color: seagreen;
        color: darkslategrey;
    }


</style>
@stop

@section('script')
{{--include external js here if you neeed--}}
@stop










