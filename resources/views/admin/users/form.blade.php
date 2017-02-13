{!! Form::open(['url' => route('register'), 'class' => 'form-horizontal']) !!}

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{ Form::label('email', 'Email adress', ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::email('email', old('email'), ['class' => 'form-control', 'required', 'autofocus']) }}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

@if ($action == 'create')
@foreach(['password', 'password_confirmation'] as $value)
    <div class="form-group{{ $errors->has($value) ? ' has-error' : '' }}">
        {{ Form::label($value, null, ['class' => 'col-md-4 control-label']) }}

        <div class="col-md-6">
            {{ Form::password($value, ['class' => 'form-control']) }}

            @if ($errors->has($value))
                <span class="help-block">
                    <strong>{{ $errors->first($value) }}</strong>
                </span>
            @endif
        </div>
    </div>
@endforeach
@endif

@foreach(['nick', 'name', 'surname', 'document', 'phone'] as $value)
    <div class="form-group{{ $errors->has($value) ? ' has-error' : '' }}">
        {{ Form::label($value, null, ['class' => 'col-md-4 control-label']) }}

        <div class="col-md-6">
            {{ Form::text($value, old($value), ['class' => 'form-control', 'required']) }}
        
            @if ($errors->has($value))
                <span class="help-block">
                    <strong>{{ $errors->first($value) }}</strong>
                </span>
            @endif
        </div>
    </div>
@endforeach

<div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
    {{ Form::label('role_id', 'Select role:', ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}

        @if ($errors->has('role_id'))
            <span class="help-block">
                <strong>{{ $errors->first('role_id') }}</strong>
            </span>
        @endif                                
    </div>
</div>


<div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
    {{ Form::label('location_id', 'Select location_id (required if role is Online):', ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {!! Form::select('location_id', $locations, old('location_id'), ['class' => 'form-control', 'placeholder' => '-----']) !!}

        @if ($errors->has('location_id'))
            <span class="help-block">
                <strong>{{ $errors->first('location_id') }}</strong>
            </span>
        @endif                                
    </div>
</div>
