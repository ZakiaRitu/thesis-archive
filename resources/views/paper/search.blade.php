<section class="page-search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Advance Search -->
                <div class="advance-search">
                    <form class="form" method="GET" action="{{ route('paper.paperSearch') }}">
                        <div class="form-row text-center">
                            <div class="form-group col-md-5">
                                {{--<input type="text" name="paper_title"  class="form-control" id="inputtext4" placeholder="What are you looking for">--}}
                                {!! Form::text('paper_title', null, ['class'=>'form-control inputtext4', 'id'=>'inputtext4', 'placeholder' => 'What are you looking for'])  !!}
                            </div>
                            <div class="form-group col-md-5">
                                {{--<input type="select" name="paper_category"  class="form-control" id="inputCategory4" placeholder="Category">--}}
                                {!! Form::select('paper_category', $categories, null, ['class'=>'form-control', 'id'=>'inputCategory4', 'placeholder' => 'Select Category'])  !!}
                            </div>
                            <div class="form-group col-md-2">
                                <button type="submit" class="btn1 btn-primary">Search Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>