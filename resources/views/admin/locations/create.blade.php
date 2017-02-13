@extends('admin.layouts.default')

@section('admin-content')

    <div class="panel panel-default">
        <div class="panel-heading">Create Location</div>
        <div class="panel-body">
            {!! Form::open(['url' => route('locations.store'), 'class' => 'form-horizontal']) !!}

                @include('admin/locations/form')
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection