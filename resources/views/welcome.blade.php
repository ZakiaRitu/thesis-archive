@extends('layouts.default')
@section('content')

    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1></h1>
                        <!-- <div class="short-popular-category-list text-center">
                            <h2>Popular Category</h2>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-bed"></i> Hotel</a></li>
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-grav"></i> Fitness</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-car"></i> Cars</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-cutlery"></i> Restaurants</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href=""><i class="fa fa-coffee"></i> Cafe</a>
                                </li>
                            </ul>
                        </div> -->

                    </div>
                    <!-- Advance Search -->
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

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>



    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
            </div>
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










