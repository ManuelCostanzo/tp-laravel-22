@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$provider->name }}</h1>
	<hr>

	<h2>Datas</h1>
	CUIT: {{$provider->cuit}}
	<li>CREADO EL: {{$provider->created_at}}</li>
	<li>MODIFICADO EL: {{$provider->updated_at}}</li>

	<a href="{{ route('providers.index') }}" class="btn btn-info">Back to all providers</a>
	<a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-primary">Edit provider</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['providers.destroy', $provider->id]]) !!}
            {!! Form::submit('Delete this provider?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection