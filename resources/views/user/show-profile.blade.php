<!-- Edit Personal Info -->
<div class="widget personal-info">
    <h3 class="widget-header user"><b>{!! $user->name !!}</b>'s Information</h3>

<!-- Complete Name -->
    <div class="form-group">
        {!! Form::label('first_name', "First Name", array('class' => 'control-label')) !!}
        {!! Form::text('first_name', $user->first_name, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
    </div>


    <div class="form-group">
        {!! Form::label('last_name', "Last Name", array('class' => 'control-label')) !!}
        {!! Form::text('last_name', $user->last_name, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
    </div>

    <!-- Email -->
    <div class="form-group">
        {!! Form::label('email', "Email", array('class' => 'control-label')) !!}
        {!! Form::text('email', $user->email, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
    </div>


    <!-- Phone Number -->
    <div class="form-group">
        {!! Form::label('phone_num', "Phone Number", array('class' => 'control-label')) !!}
        {!! Form::text('phone_num', $user->profile->phone_num, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
    </div>

    <!-- Interest -->
    <div class="form-group">
        {!! Form::label('interest', "Interest", array('class' => 'control-label')) !!}
        {!! Form::text('interest', $user->profile->interest, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
    </div>

    @if($user->profile->status == 'FACULTY')
        <!-- Designation -->
            <div class="form-group">
                {!! Form::label('designation', "Designation", array('class' => 'control-label')) !!}
                {!! Form::text('designation', $user->profile->designation, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
            </div>
    @endif


    @if($user->profile->status == 'STUDENT')
        <!-- Session -->
            <div class="form-group">
                {!! Form::label('session_year', "Session", array('class' => 'control-label')) !!}
                {!! Form::text('session_year', $user->profile->session_year, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
            </div>

            <!-- Registration -->
            <div class="form-group">
                {!! Form::label('reg_num', "Registration", array('class' => 'control-label')) !!}
                {!! Form::text('reg_num', $user->profile->reg_num, array('class' => 'form-control', 'placeholder' => 'No Information Found', 'disabled')) !!}
            </div>
    @endif


<!-- Bio -->
    <div class="form-group">
        {!! Form::label('bio', "Bio", array('class' => 'control-label')) !!}
        {!! Form::textarea('bio', $user->profile->bio , array('class' => 'form-control textarea', 'placeholder' => 'No Information Found', 'disabled')) !!}
    </div>


</div>
