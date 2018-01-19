@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">
            <div class="row">

                <!-- Teacher Create -->
                <div class="col-md-4">
                    <div class="search-result bg-gray">
                        <h2 class="text-left">{!! $title or '' !!}</h2>
                        <hr>
                        {!! Form::open(array('route' => 'teacher.store',  'files' => true) ) !!}
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name* :', array('class' => 'control-label')) !!}<br/>
                            {!!Form::text('first_name', '',array('class' => 'form-control','placeholder' =>  'First Name here', 'required'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name* :', array('class' => 'control-label')) !!}<br/>
                            {!!Form::text('last_name', '',array('class' => 'form-control','placeholder' =>  'Last Name here', 'required'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('email', 'Email* :', array('class' => 'control-label')) !!}<br/>
                            {!!Form::text('email', '',array('class' => 'form-control','placeholder' =>  'Email here', 'required'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::submit('Add New Faculty Member', array('class' => 'btn btn-primary')) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <!--End of Teacher Create -->


                <!-- Teacher List -->
                <div class="col-md-8">
                    <div class="search-result bg-gray">
                        <h2 class="text-left">Faculty Members</h2><hr>

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $teacher->user->name }}</td>
                                    <td>{{ $teacher->user->email }}</td>
                                    <td>
                                        @if($teacher->is_admin == 'YES' && Auth::user()->id != $teacher->user_id )
                                            <a href="{{ route('teacher.makeAdmin', $teacher->user_id) }}"
                                               class="btn btn-warning btn-sm">
                                                Remove From Admin
                                            </a>
                                        @elseif($teacher->is_admin == 'NO' )
                                            <a href="{{ route('teacher.makeAdmin', $teacher->user_id) }}"
                                               class="btn btn-info btn-sm">
                                                Make Admin
                                            </a>
                                        @else
                                            ---
                                        @endif

                                    </td>
                                    <td>
                                        @if($teacher->is_admin != 'YES' && Auth::user()->id != $teacher->user_id)
                                              <a href="#" class="btn btn-danger btn-sm btn-archive deleteBtn"
                                                 data-toggle="modal" data-target="#deleteConfirm"
                                                 deleteId="{!! $teacher->user_id !!}">
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
                    </div>
                </div>
                <!--End of Teacher List -->


            </div>
        </div>
        </div>
    </section>



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

@stop
@section('script')
    {{--include external js here if you neeed--}}

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


