@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$object->nick }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>NICK: {{$object->nick}}</li>
	<li>EMAIL: {{$object->email}}</li>
	<li>NAME: {{$object->name}}</li>
	<li>SURNAME: ${{$object->surname}}</li>
	<li>ROLE: {{$object->role->name}}</li>
	<li>LOCATION: {{$object->location->name}}</li>
	<li>DOCUMENT: {{$object->document}}</li>
	<li>PHONE: {{$object->phone}}</li>
	<li>STATUS: {{($object->enabled) ? 'enabled' : 'bloqued'}}</li>
	<li>CREADO EL: {{$object->created_at}}</li>
	<li>MODIFICADO EL: {{$object->updated_at}}</li>

	<a href="{{ route('users.index') }}" class="btn btn-info">Back to all users</a>
	<a href="{{ route('users.edit', $object->id) }}" class="btn btn-primary">Edit user</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $object->id]]) !!}
            {!! Form::submit('Delete this user?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection