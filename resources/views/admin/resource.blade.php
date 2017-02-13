@extends('admin.layouts.default')

@section('admin-content')
	
	@if (View::exists('admin.' . $route . '/' . $view))
		@include('admin/' . $route . '.' . $view)
	@else
		@include('admin.' . $view)  
	@endif 	
@endsection