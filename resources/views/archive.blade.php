@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                @if(count($archives)== 0)
                    <div class="col-md-12">
                        <div class="search-result bg-gray">
                            <h2 class="text-center">No Data Found</h2>
                        </div>
                    </div>
                @endif


                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2 class="text-left">{!! $title or '' !!}</h2><hr>

                        <div class="col-md-12">
                            <div class="product-grid-list">
                                <div class="row mt-30">
                                    @foreach($archives as $archive)
                                        <div class="col-sm-12 col-lg-4 col-md-6">
                                            <!-- product card -->
                                            <div class="product-item bg-light">
                                                <div class="card" style="background: white">
                                                    <div class="thumb-content">
                                                    </div>
                                                    <div class="card-body">
                                                        <h4 class="card-title text-center">
                                                            <a href="{!! route('paper.archivedPaper',[$archive->month,$archive->year]) !!}">
                                                                {!! $archive->year!!}
                                                            </a><br>
                                                        </h4>

                                                        <ul class="list-inline product-meta text-center">
                                                            <li class="list-inline-item">
                                                                <a href="#"><i class="fa fa-folder-open-o"></i>
                                                                    <b>
                                                                        {!! $archive->paper_count!!}
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


                        {{--<div class="pagination justify-content-center">--}}
                            {{--<nav aria-label="Page navigation example">--}}
                                {{--{!! $archives->links('vendor.pagination.bootstrap-4') !!} <br>--}}
                            {{--</nav>--}}
                        {{--</div>--}}
                        <br><br>
                    </div>



                </div>
            </div>
        </div>
    </section>
<br><br>
@stop
@section('style')
    {{--include external css here if you neeed--}}

    <style>
        #footer-test{
            position: fixed;
        }
    </style>
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop


