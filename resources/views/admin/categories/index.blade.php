@extends('admin.layouts.default')

@section('admin-content')

	@foreach($categories as $cat)
	    @if($cat->children->count() > 0)
	        <li class="dropdown">
	             <a href="#">{{ $cat->name }}
	             <ul>
	                 @foreach($cat->children as $submenu)
	                     <li><a href="/{{ $submenu->slug }}">{{ $submenu->name }}</a></li>
	                  @endforeach
	             </ul>
	       </li>
	    @else
	        <li><a href="/{{ $cat->slug }}">{{ $cat->name }}</a></li>
	    @endif
<span class="caret"></span></a> <span> <a href="{{ route('categories.show', $cat->id) }}"> ver </a> </span> <span> <a href="{{ route('categories.edit', $cat->id) }}"> editar </a> </span> <span> <a href=""> borrar </a> </span>
	@endforeach
@endsection