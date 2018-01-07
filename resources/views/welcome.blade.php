@extends('layouts.default')
@section('content')

    <section class="hero-area  text-center ">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <h1><b>Thesis Archive</b></h1>

                       <div class="short-popular-category-list text-center">
                        </div>
                        <div class="advance-search">
                            <form action="#">
                                <div class="row">
                                    <!-- Store Search -->
                                    <div class="col-lg-12 col-md-24">
                                        <div class="block d-flex">
                                            <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="search" placeholder="Search paper">
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
    </section>
<br>
<br>
<br>
<br>
<br>
@stop
@section('style')
    {{--include external css here if you neeed--}}

    <style>
        body{
            background-image: url({!! asset('img/background.png') !!});
        }
        b{
            font-family: cursive;
            font-variant: small-caps;
            font-weight: 900;
            font-size: larger;
        }
    </style>
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop










