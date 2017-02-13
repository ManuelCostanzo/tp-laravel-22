@extends('admin.layouts.default')

@section('admin-content')

	<div class="col-12 col-sm-12 col-lg-12"> 
	@include('admin/locations/search')         
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
	    	@foreach($locations as $lo)
		      <tr>
		        <td>{{$lo->name}}</td>
		        <td> <a href="{{ route('locations.show', $lo->id) }}" class="btn btn-sm btn-primary"> show </a></td>
		        <td> <a href="{{ route('locations.edit', $lo->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
		        <td>        
		        	{!! Form::open(['method' => 'DELETE', 'route' => ['locations.destroy', $lo->id]]) !!}
            			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
        			{!! Form::close() !!}
        		</td>
		      </tr>
		    @endforeach
	    </tbody>
	  </table>
	  {{ $locations->appends(Request::only('q'))->links() }}
	  </div>
	</div>
@endsection