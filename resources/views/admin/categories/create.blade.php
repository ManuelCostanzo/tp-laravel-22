@extends('admin.layouts.default')

@section('admin-content')

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

    <div class="panel panel-default">
        <div class="panel-heading">Create Category</div>
        <div class="panel-body">
            {!! Form::open(['url' => route('categories.store'), 'class' => 'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {{ Form::label('name', null, ['class' => 'col-md-4 control-label']) }}

                    <div class="col-md-6">
                        {{ Form::text('name', old('name'), ['class' => 'form-control', 'required', 'autofocus']) }}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
        
                <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                    {{ Form::label('parent_id', 'Select location:', ['class' => 'col-md-4 control-label']) }}
                    <div class="col-md-6">
                        <select class="form-control" id="parent_id" name="parent_id">
                            <option value="">----</option>
                            @foreach ($categories as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach  
                        </select>

                        @if ($errors->has('parent_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('parent_id') }}</strong>
                            </span>
                        @endif                                
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection