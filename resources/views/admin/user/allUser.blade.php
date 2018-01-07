@extends('layouts.default')
@section('content')
    <!--=================================
             Page Title
       ==================================-->
    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>{!! $title  or \App\ProjectSettings\Setting::$projectName!!}</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!--==================================
    =            Blog Section            =
    ===================================-->

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

                            <div class="col-sm-12 col-lg-12 col-md-6">
                                    <!-- product card -->
                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <table id="datatable" class="table table-striped table-bordered">
                                                   <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                     <tbody>
                                                        @foreach($profiles as $profile)
                                                            <tr>
                                                                <td>{{ $profile->user->name}}</td>
                                                                <td>{{ $profile->user->email }}</td>
                                                                <td>{{ $profile->status }}</td>
                                                                <td class="actions">
                                                                    <a href="{{route('admin.user.delete', $profile->user_id)}}" class="btn btn-primary" >Delete</a>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                     </tbody>
                                               </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    <script type="text/javascript">

        $(document).ready(function() {
            /* do not add datatable method/function here , its always loaded from footer -- masiur */
            $(document).on("click", ".deleteBtn", function() {
                var deleteId = $(this).attr('deleteId');
                var url = "<?php echo URL::route('admin.user.allUser'); ?>";
                $(".deleteForm").attr("action", url+'/'+deleteId);
            });

        });
    </script>

@stop


