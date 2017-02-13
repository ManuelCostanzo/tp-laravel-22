@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$role->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>CREADO EL: {{$role->created_at}}</li>
	<li>MODIFICADO EL: {{$role->updated_at}}</li>

	<a href="{{ route('brands.index') }}" class="btn btn-info">Back to all roles</a>
	<a href="{{ route('brands.edit', $role->id) }}" class="btn btn-primary">Edit role</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['brands.destroy', $role->id]]) !!}
            {!! Form::submit('Delete this role?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection