<div class="col-12 col-sm-12 col-lg-12"> 
	@if (View::exists('admin/' . $route .'.search'))
		@include('admin/' . $route . '.search')
	@else
		@include("admin.search")  
	@endif       

	@include('admin/' . $route . '.list')
</div>