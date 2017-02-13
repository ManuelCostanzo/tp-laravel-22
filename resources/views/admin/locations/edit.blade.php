@extends('admin.layouts.default')

@section('admin-content')

    <div class="panel panel-default">
        <div class="panel-heading">Edit Location</div>
        <div class="panel-body">
            {!! Form::model($location, ['method' => 'PATCH', 'url' => route('locations.update', $location->id), 'class' => 'form-horizontal']) !!}

                @include('admin/locations/form')
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection