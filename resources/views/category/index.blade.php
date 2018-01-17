@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2 class="text-center">{!! $title or '' !!}
                        <a href="{{ route('category.create') }}" class="btn btn-info btn-xs btn-archive">Create New Category</a></h2>

                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{!! $category->id !!}</th>
                                    <td>{!! $category->cat_name !!}</td>
                                    <td>
                                        <a class="btn btn-warning btn-xs btn-archive Editbtn"
                                           href="{!!route('category.edit',$category->cat_meta_data)!!}"
                                           style="margin-right: 3px;"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-xs btn-archive deleteBtn"
                                           data-toggle="modal" data-target="#deleteConfirm"
                                           deleteId="{!! $category->cat_meta_data !!}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        <div class="pagination justify-content-center">
                            <nav aria-label="Page navigation example">
                                {!! $categories->links('vendor.pagination.bootstrap-4') !!}
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
                    {!! Form::open(array('route' => array('category.delete', 0), 'method'=> 'delete', 'class' => 'deleteForm')) !!}
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
                var url = "<?php echo URL::route('category.index'); ?>";
                $(".deleteForm").attr("action", url+'/'+deleteId);
            });

        });
    </script>


@stop


