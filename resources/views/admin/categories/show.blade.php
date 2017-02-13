@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$object->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>CREADO EL: {{$object->created_at}}</li>
	<li>MODIFICADO EL: {{$object->updated_at}}</li>


	<h2>PARENT</h1>
	@if($object->parent()->count() > 0)
		<li><a href="{{ $object->parent->name }}">{{ $object->parent->name }}</a></li>
	@else
		NO PARENT
	@endif

	<h2>CHILDRENDS</h1>
	@if($object->children()->count() > 0)
		@foreach($object->children as $submenu)
		     <li><a href="/{{ $submenu->slug }}">{{ $submenu->name }}</a></li>
		@endforeach
	@else
		NO CHILDRENS
	@endif
	<a href="{{ route('categories.index') }}" class="btn btn-info">Back to all categories</a>
	<a href="{{ route('categories.edit', $object->id) }}" class="btn btn-primary">Edit category</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $object->id]]) !!}
            {!! Form::submit('Delete this category?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection