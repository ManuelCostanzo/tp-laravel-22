@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$location->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>CREADO EL: {{$location->created_at}}</li>
	<li>MODIFICADO EL: {{$location->updated_at}}</li>

	<a href="{{ route('locations.index') }}" class="btn btn-info">Back to all locations</a>
	<a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary">Edit location</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $location->id]]) !!}
            {!! Form::submit('Delete this location?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection