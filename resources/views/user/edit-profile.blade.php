<!-- Edit Personal Info -->
<div class="widget personal-info">
    <h3 class="widget-header user">Personal Information</h3>
    {!! Form::model($user->profile, array('route' => ['profile.updateInfo'], 'method' => 'put', 'class' => 'form-horizontal')) !!}
        <!-- Complete Name -->
        <div class="form-group">
            {!! Form::label('name', "Complete Name", array('class' => 'control-label')) !!}
            {!! Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Enter Name Here..')) !!}
        </div>

        <!-- Email -->
        <div class="form-group">
            {!! Form::label('email', "Email", array('class' => 'control-label')) !!}
            {!! Form::text('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Enter Name Email..', 'disabled')) !!}
        </div>


        <!-- Phone Number -->
        <div class="form-group">
            {!! Form::label('phone_num', "Phone Number", array('class' => 'control-label')) !!}
            {!! Form::text('phone_num', null, array('class' => 'form-control', 'placeholder' => 'Enter Phone Number Here..')) !!}
        </div>

        <!-- Interest -->
        <div class="form-group">
            {!! Form::label('interest', "Interest", array('class' => 'control-label')) !!}
            {!! Form::text('interest', null, array('class' => 'form-control', 'placeholder' => 'Enter Your Interest Here.. ')) !!}
        </div>

        @if($user->profile->status == 'FACULTY')
            <!-- Designation -->
            <div class="form-group">
                {!! Form::label('designation', "Designation", array('class' => 'control-label')) !!}
                {!! Form::text('designation', null, array('class' => 'form-control', 'placeholder' => 'Enter Your Designation Here..')) !!}
            </div>
        @endif


        @if($user->profile->status == 'STUDENT')
            <!-- Session -->
            <div class="form-group">
                {!! Form::label('session_year', "Session", array('class' => 'control-label')) !!}
                {!! Form::text('session_year', null, array('class' => 'form-control', 'placeholder' => 'Enter Your Session Here..')) !!}
            </div>

            <!-- Registration -->
            <div class="form-group">
                {!! Form::label('reg_num', "Registration", array('class' => 'control-label')) !!}
                {!! Form::text('reg_num', null, array('class' => 'form-control', 'placeholder' => 'Enter Your Registration Number Here..')) !!}
            </div>
        @endif


       <!-- Bio -->
        <div class="form-group">
            {!! Form::label('bio', "Bio", array('class' => 'control-label')) !!}
            {!! Form::textarea('bio', null, array('class' => 'form-control textarea', 'placeholder' => 'Enter Your Bio Here.. ')) !!}
        </div>



    <!-- Submit button -->
        <button class="btn btn-transparent">Save My Changes</button>
    {{ Form::close() }}
</div>