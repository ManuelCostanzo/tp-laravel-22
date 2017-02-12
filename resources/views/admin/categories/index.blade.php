@extends('admin.layouts.default')

@section('admin-content')

	@foreach($categories as $cat)
	    @if($cat->children->count() > 0)
	        <li class="dropdown">
	             <a href="#">{{ $cat->name }} <span class="caret"></span></a> |||||||| <span> <a href="{{ route('categories.show', $cat->id) }}"> ver </a> </span> <span> <a href="{{ route('categories.edit', $cat->id) }}"> editar </a> </span></li>
	             <ul>
	                 @foreach($cat->children as $submenu)
	                     <li><a href="/{{ $submenu->slug }}">{{ $submenu->name }}</a>
	                      |||||||||||||||<span> <a href="{{ route('categories.show', $submenu->id) }}"> ver </a> </span> <span> <a href="{{ route('categories.edit', $submenu->id) }}"> editar </a> </span></li>

	                  @endforeach
	             </ul>
	       </li>
	    @elseif($cat->parent()->count() == 0)
	        <li><a href="/{{ $cat->slug }}">{{ $cat->name }}</a>
	    
<span class="caret"></span></a> <span> <a href="{{ route('categories.show', $cat->id) }}"> ver </a> </span> <span> <a href="{{ route('categories.edit', $cat->id) }}"> editar </a> </span></li>
@endif
	@endforeach
@endsection