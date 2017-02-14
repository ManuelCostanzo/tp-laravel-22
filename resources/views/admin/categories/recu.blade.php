@foreach($objects as $cat)
	@if($cat->children->count() > 0)
	 	<li class="dropdown">  <a href="#">{{ $cat->name }}<span class="caret"></span></a>
		 	<ul>
				@foreach($cat->children as $child)
					@include('admin.categories/recu', ['child' => $child])
				@endforeach
			</ul>
		</li>
	@endif