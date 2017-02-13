@extends('admin.layouts.default')

@section('admin-content')

	<div class="col-12 col-sm-12 col-lg-12"> 
	@include('admin/brands/search')         
	  <table class="table">
	    <thead>
	      <tr>
	        <th>Brand</th>
	        <th>Show</th>
	        <th>Edit</th>
	        <th>Delete</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($brands as $br)
		      <tr>
		        <td>{{$br->name}}</td>
		        <td> <a href="{{ route('brands.show', $br->id) }}" class="btn btn-sm btn-primary"> show </a></td>
		        <td> <a href="{{ route('brands.edit', $br->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
		        <td>        
		        	{!! Form::open(['method' => 'DELETE', 'route' => ['brands.destroy', $br->id]]) !!}
            			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
        			{!! Form::close() !!}
        		</td>
		      </tr>
		    @endforeach
	    </tbody>
	  </table>
	  {{ $brands->links() }}
	  </div>
	</div>
@endsection