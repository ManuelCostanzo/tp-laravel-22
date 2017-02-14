@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$object->date }}</h1>
	<hr>
	<h2> PRODUCTOS </h2>
	@foreach ($object->products as $pr)
		<li> NOMBRE: {{$pr->name}} </li>
	@endforeach
	<br><br>
	<li>CREADO EL: {{$object->created_at}}</li>
	<li>MODIFICADO EL: {{$object->updated_at}}</li>

	<a href="{{ route('menus.index') }}" class="btn btn-info">Back to all menus</a>
	<a href="{{ route('menus.edit', $object->id) }}" class="btn btn-primary">Edit menu</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['menus.destroy', $object->id]]) !!}
            {!! Form::submit('Delete this menu?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection