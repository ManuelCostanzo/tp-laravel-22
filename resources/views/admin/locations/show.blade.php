@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$object->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>CREADO EL: {{$object->created_at}}</li>
	<li>MODIFICADO EL: {{$object->updated_at}}</li>

	<a href="{{ route('locations.index') }}" class="btn btn-info">Back to all locations</a>
	<a href="{{ route('locations.edit', $object->id) }}" class="btn btn-primary">Edit location</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $object->id]]) !!}
            {!! Form::submit('Delete this location?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection