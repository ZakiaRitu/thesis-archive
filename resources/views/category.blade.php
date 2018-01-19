@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                @if(count($categories)== 0)
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
                                                            <li class="list-inline-item">
                                                                <a href="#"><i class="fa fa-calendar"></i>
                                                                    Created at : {!! $category->created_at->formatLocalized('%A %d %B %Y'); !!}
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="pagination justify-content-center">
                            <nav aria-label="Page navigation example">
                                {!! $categories->links('vendor.pagination.bootstrap-4') !!} <br>
                            </nav>
                        </div>

                    </div>



                </div>
            </div>
        </div>
        <br><br>
    </section>

@stop
@section('style')
    {{--include external css here if you neeed--}}
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop


