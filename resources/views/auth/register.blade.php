@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
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

                        @foreach(['password', 'password_confirmation'] as $value)
                            <div class="form-group{{ $errors->has($value) ? ' has-error' : '' }}">
                                {{ Form::label($value, null, ['class' => 'col-md-4 control-label']) }}

                                <div class="col-md-6">
                                    {{ Form::password($value, ['class' => 'form-control', 'required']) }}

                                    @if ($errors->has($value))
                                        <span class="help-block">
                                            <strong>{{ $errors->first($value) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach

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

                        <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }}">
                            {{ Form::label('location_id', 'Select location:', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                <select class="form-control" id="location_id" name="location_id" required>
                                    <option value="0">----</option>
                                    @foreach ($locations as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach  
                                </select>

                                @if ($errors->has('location_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location_id') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
