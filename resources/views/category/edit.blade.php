@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="search-result bg-gray">
                        <h2 class="text-left">{!! $title or '' !!}</h2><hr>

                        {!!Form::model($category,['route' => ['category.update',$category->cat_meta_data], 'method' => 'put' ])!!}


                        <div class="form-group">
                            {!! Form::label('cat_name', 'Category Name* :', array('class' => 'control-label')) !!}<br/>
                            {!!Form::text('cat_name', null ,array('class' => 'form-control','placeholder' =>  'Category Name here', 'required'))!!}
                        </div><br/>



                        <div class="form-group">
                            {!! Form::submit('Update Category', array('class' => 'btn btn-primary')) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="search-result bg-gray">
                        <h2 class="text-left">Category List</h2><hr>
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
                                        <a class="btn btn-warning btn-sm btn-archive Editbtn"
                                           href="{!!route('category.edit',$category->cat_meta_data)!!}"
                                           style="margin-right: 3px;"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm btn-archive deleteBtn"
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
@stop
@section('style')
    {{--include external css here if you neeed--}}

@stop
@section('script')
    {{--include external js here if you neeed--}}

    <script type="text/javascript">
    </script>


@stop


