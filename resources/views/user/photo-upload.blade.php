<center>
    <div class="box box-primary">
        <div class="box-body box-profile img-circle">
            <div class="photo-upload">
                {{ Form::open(array('route' => 'profile.updatePhoto', 'method' => 'put', 'files' => true)) }}
                <fieldset>
                    @if($user->profile->image != null)
                        <img class="preview rounded-circle" id="preview" height="200px"  width="200px" alt=" "  src="{{asset($user->profile->image)}}">
                    @else
                        <img src="{!! asset('images/anonymous.jpg') !!}" alt="" class="rounded-circle">
                    @endif
                    <br/>
                    <br/>
                    @if(Auth::user()->id == $user->id)
                    <input type="file" name="image_url" id="imgInp" onchange="loadFile(event);">
                    @endif
                </fieldset>
                @if(Auth::user()->id == $user->id)
                <fieldset>
                    {{ Form::submit('Update Photo', array('class' => 'btn btn-main-sm btn-transparent')) }}
                </fieldset>
                @endif
                {{ Form::close() }}
            </div>
            </div>
        </div>
</center>





