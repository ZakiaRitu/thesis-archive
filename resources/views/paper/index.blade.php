@extends('layouts.default')
@section('content')


  @if(\Request::route()->getName() == 'paper.paperSearch')
    @include('paper.search')
  @endif

    <section class="section-sm">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <p>Found {!!  count($papers)  !!} Papers in .000023 ms</p>
                </div>
                
                @if(count($papers)== 0)
                    <div class="col-md-12">
                        <div class="search-result bg-gray">
                            <h2 class="text-center">No Data Found</h2>
                        </div>
                    </div>
                @endif



                <div class="col-md-12">
                    <div class="product-grid-list">
                        <div class="row mt-30">

                            @foreach($papers as $paper)
                                <div class="col-sm-12 col-lg-12 col-md-6">
                                    <!-- product card -->
                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">

                                            </div>
                                            <div class="card-body">
                                                <h3 class="card-title">
                                                    <a href="#">
                                                        {!! $paper->paper_title !!}
                                                    </a><br>
                                                </h3>
                                                 <small>
                                                     Authors:
                                                     @foreach($paper->users as $user)
                                                     <a style="color: #00aced" target="_blank" href="{!! route('profile.userProfile',$user->user_meta_data) !!}">
                                                         {!! $user->name !!}
                                                     </a>,&nbsp;
                                                     @endforeach
                                                 </small>
                                                <br>
                                                <small>
                                                    <em>
                                                    Categories:
                                                    @foreach($paper->categories as $category)
                                                        <a style="color:yellowgreen" target="_blank" href="{!! route('paper.categoryWisePaper',$category->cat_meta_data) !!}">
                                                            {!! $category->cat_name !!}
                                                        </a>,&nbsp;
                                                    @endforeach
                                                    </em>
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
                            {!! $papers->links() !!}
                        </nav>
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
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop


