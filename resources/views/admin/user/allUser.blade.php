@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2 class="text-center">{!! $title or '' !!}</h2><hr>
                        <table class="table">
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

                                    <td>
                                        @if($profile->is_admin != 'YES')
                                        <a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn"
                                           data-toggle="modal" data-target="#deleteConfirm"
                                           deleteId="{!! $profile->user_id !!}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        @else
                                            ---
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>



                        <div class="pagination justify-content-center">
                            <nav aria-label="Page navigation example">
                                {{ $profiles->links('vendor.pagination.bootstrap-4') }}
                                <br>
                            </nav>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    <br><br>


    <!-- Modal -->
    <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-crenter" id="myModalLabel">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    Are you sure to delete?
                </div>
                <div class="modal-footer">
                    {!! Form::open(array('route' => array('admin.user.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    {!! Form::submit('Yes, Delete', array('class' => 'btn btn-success')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


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

    <script type="text/javascript" charset="utf-8">
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


