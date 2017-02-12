@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => route('password.request'), 'class' => 'form-horizontal']) !!}

                        {{ Form::token() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{ Form::label('email', 'Email adress', ['class' => 'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::email('email', $email or old('email'), ['class' => 'form-control', 'required', 'autofocus']) }}

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit('Reset Password', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
