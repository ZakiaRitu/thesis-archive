<!-- Edit Personal Info -->
<div class="widget personal-info">
    <h3 class="widget-header user">{!! $user->name !!} Information</h3>

<!-- Complete Name -->
    <div class="form-group">
        {!! Form::label('name', "Complete Name", array('class' => 'control-label')) !!}
        {!! Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Enter Name Here..', 'disabled')) !!}
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


</div>
