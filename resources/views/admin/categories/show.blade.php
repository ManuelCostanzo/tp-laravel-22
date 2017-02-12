@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$category->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>CREADO EL: {{$category->created_at}}</li>
	<li>MODIFICADO EL: {{$category->updated_at}}</li>


	<h2>PARENT</h1>
	@if($category->parent()->count() > 0)
		<li><a href="{{ $category->parent->name }}">{{ $category->parent->name }}</a></li>
	@else
		NO PARENT
	@endif

	<h2>CHILDRENDS</h1>
	@if($category->children()->count() > 0)
		@foreach($category->children as $submenu)
		     <li><a href="/{{ $submenu->slug }}">{{ $submenu->name }}</a></li>
		@endforeach
	@else
		NO CHILDRENS
	@endif
	<a href="{{ route('categories.index') }}" class="btn btn-info">Back to all categories</a>
	<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit category</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]) !!}
            {!! Form::submit('Delete this category?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection