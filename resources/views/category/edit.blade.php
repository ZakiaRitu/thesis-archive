@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2 class="text-left">{!! $title or '' !!}
                        <a href="{{ route('category.index') }}" class="btn btn-info btn-xs btn-archive">Category List</a></h2><hr>

                        {!!Form::model($category,['route' => ['category.update',$category->cat_meta_data], 'method' => 'put' ])!!}


                        <div class="form-group">
                            {!! Form::label('cat_name', 'Category Name* :', array('class' => 'control-label')) !!}<br/>
                            {!!Form::text('cat_name', null ,array('class' => 'form-control','placeholder' =>  'Category Name here', 'required'))!!}
                        </div><br/>



                        <div class="form-group">
                            {!! Form::submit('New Category', array('class' => 'btn btn-primary')) !!}
                        </div>



                        {!! Form::close() !!}

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


