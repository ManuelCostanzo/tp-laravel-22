@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$brand->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>CREADO EL: {{$brand->created_at}}</li>
	<li>MODIFICADO EL: {{$brand->updated_at}}</li>

	<a href="{{ route('brands.index') }}" class="btn btn-info">Back to all brands</a>
	<a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-primary">Edit brand</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['brands.destroy', $brand->id]]) !!}
            {!! Form::submit('Delete this brand?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection