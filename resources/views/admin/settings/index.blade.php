@extends('admin.layouts.default')

@section('admin-content')
    <div class="panel panel-default">
        <div class="panel-heading">Edit Settings</div>
        <div class="panel-body">
            {!! Form::model($object, ['method' => 'PATCH', 'url' => route('settings.update', $object->id), 'class' => 'form-horizontal', 'files' => true]) !!}

            @include('admin.settings/form')
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection