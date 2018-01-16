@extends('layouts.default')
@section('content')


    <section class="section-sm">
        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2 class="text-center">{!! $title or '' !!}</h2><hr>

                        {!!Form::model($paper,['route' => ['paper.update',$paper->paper_meta_data], 'method' => 'put' ])!!}


                        <div class="form-group">
                            {!! Form::label('paper_type', 'Select Paper Type* :', array('class' => 'col-md-2 control-label')) !!} <br>
                            {!! Form::select('paper_type', $paperType, null,array('class' => 'select2', 'autofocus', 'required'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('category', 'Select Paper Category:', array('class' => 'control-label')) !!}<br/>
                            {!! Form::select('category[]', $category, $paper->categories,array('class' => 'tag_list','multiple', 'autofocus'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('paper_title', 'Title* :', array('class' => 'control-label')) !!}<br/>
                            {!! Form::text('paper_title', null,array('class' => 'form-control','placeholder' =>  'Paper title here', 'required'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('paper_abstract', 'Abstract :', array('class' => 'control-label')) !!}<br/>
                            {!! Form::textarea('paper_abstract', null,array('class' => 'summernote form-control','placeholder' =>  '...................'))!!}
                        </div><br/>


                        <div class="form-group">
                            {!! Form::label('paper_publish_date', 'Publishing Date * :', array('class' => 'control-label')) !!}<br/>
                            {!! Form::text('paper_publish_date', null,array('class' => 'form-control','id'=>'datepicker','placeholder' =>  'Publishing Date here', 'required'))!!}
                        </div><br/>


                        <div class="form-group">
                            {!! Form::label('paper_published_at', 'Publication Name :', array('class' => 'control-label')) !!}<br/>
                            {!! Form::text('paper_published_at', null,array('class' => 'form-control','placeholder' =>  'Publication Name here'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('author', 'Select Paper Author:', array('class' => 'control-label')) !!}<br/>
                            {!! Form::select('author[]', $users, $paper->users,array('class' => 'tag_list','multiple', 'autofocus'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('paper_published_url', 'Paper Published Url(optional) :', array('class' => 'control-label')) !!}<br/>
                            {!! Form::text('paper_published_url', null,array('class' => 'form-control','placeholder' =>  'Paper url here'))!!}
                        </div><br/>


                        <div class="form-group">
                            {!! Form::label('paper_cite', 'Cite :', array('class' => 'control-label')) !!}<br/>
                            {!! Form::textarea('paper_cite', null,array('size'=>'30x5','class' => 'form-control','placeholder' =>  'Paper Citation here'))!!}
                        </div><br/>

                        <div class="form-group">
                            {!! Form::label('file', 'Choose Pdf/Doc File') !!}<br>
                            {!! Form::file('file') !!}
                        </div> <br>

                        <div class="form-group">
                            {!! Form::submit('Submit Paper', array('class' => 'btn btn-primary')) !!}
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
    {!! Html::style('assets/timepicker/bootstrap-datepicker.min.css') !!}
    {!! Html::style('assets/tagsinput/jquery.tagsinput.css') !!}
    {{--{!! Html::style('assets/select2/select2.css') !!}--}}
    {!! Html::style('assets/summernote/summernote.css') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
    {!! Html::script('assets/timepicker/bootstrap-datepicker.js') !!}
    {!! Html::script('assets/tagsinput/jquery.tagsinput.min.js') !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {{--{!! Html::script('assets/select2/select2.min.js') !!}--}}
    {!! Html::script('assets/summernote/summernote.min.js') !!}

    <script type="text/javascript">

        jQuery(document).ready(function() {

            $('.summernote').summernote({
                height: 200,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true                 // set focus to editable area after initializing summernote
            });
            // Tags Input
            jQuery('#tags').tagsInput({
                width:'auto',
                height: 40
            });

            jQuery('#datepicker').datepicker();
        });


        $('.select2').select2({
            width: '100%',
            theme: "classic"

        });

        $('.tag_list').select2({
            tags:true,
            width: '100%',
            theme: "classic",
            placeholder: 'Select'

        });
    </script>


@stop


