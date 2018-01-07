@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                @if(count($profiles)== 0)
                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2 class="text-center">No Data Found</h2>
                    </div>
                </div>
                @endif


                <div class="col-md-12">
                    <div class="product-grid-list">
                        <div class="row mt-30">

                            @foreach($profiles as $profile)
                            <div class="col-sm-12 col-lg-4 col-md-6">
                                <!-- product card -->
                                <div class="product-item bg-light">
                                    <div class="card">
                                        <div class="thumb-content">
                                            <!-- <div class="price">$200</div> -->
                                            <a href="{!! route('profile.userProfile',$profile->user->user_meta_data) !!}">
                                                <img class="card-img-top img-fluid" style="height: 300px !important;" src="{!! asset($profile->image) !!}" alt="profile">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title text-center">
                                                <a href="{!! route('profile.userProfile',$profile->user->user_meta_data) !!}">
                                                    {!! $profile->user->name !!}
                                                </a><br>
                                                @if($profile->status == 'FACULTY')
                                                    <p>{!! $profile->designation !!}</p>
                                                @endif
                                            </h4>

                                            <ul class="list-inline product-meta text-center">
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="fa fa-folder-open-o"></i>
                                                        <b>
                                                            {!! \App\PaperUser::where('user_id', $profile->user->id)->count() !!}
                                                        </b> Papers
                                                    </a>
                                                </li><br>
                                                <li class="list-inline-item">
                                                    <a href="#"><i class="fa fa-calendar"></i>
                                                        Joined at : {!! $profile->user->created_at->toDateString() !!}
                                                    </a>
                                                </li>
                                            </ul>
                                            {{--<p class="card-text text-center">--}}
                                                {{--xfdshjghjdhrtkj--}}
                                            {{--</p>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="pagination justify-content-center">
                        <nav aria-label="Page navigation example">
                            {!! $profiles->links() !!}
                        </nav>
                    </div>


                </div>
            </div>
        </div>
    </section>

@stop
@section('style')
    {{--include external css here if you neeed--}}
@stop
@section('script')
    {{--include external js here if you neeed--}}
@stop


