{{ Form::open(array('route' => 'profile.updatePhoto', 'method' => 'put', 'files' => true)) }}
    @if($user->profile->image != null)
        <div class="avatar" id="avatar">
            <div><img class="preview rounded-circle" id="preview" src="{{asset($user->profile->image)}}" id="avatar-image" class="avatar_img" id="">
            </div>
            @if(Auth::check() && Auth::user()->id == $user->id)
            <div class="avatar_upload" >
                <label class="upload_label">Upload
                    <input type="file"   name="image_url" id="upload" onchange="loadFile(event);">
                </label>
            </div>
            @endif
        </div>
    @else
        <div class="avatar" id="avatar">
            <div><img src="{!! asset('images/anonymous.jpg') !!}" id="avatar-image" class="avatar_img" id="">
            </div>
            @if(Auth::check() && Auth::user()->id == $user->id)
            <div class="avatar_upload" >
                <label class="upload_label">Upload
                    <input type="file"  name="image_url" id="upload" onchange="loadFile(event);">
                </label>
            </div>
            @endif
        </div>
    @endif

    <p class="file-name"></p>
{{ Form::close() }}







