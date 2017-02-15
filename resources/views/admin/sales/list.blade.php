<table class="table">
<thead>
  <tr>
    <th>Date</th>
    <th>Total price</th>
    <th>Show</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
	@foreach($objects as $sa)
      <tr>
        <td>{{$sa->created_at}}</td>
        <td>{{$sa->total_price}}</td>
        <td> <a href="{{ route('sales.show', $sa->id) }}" class="btn btn-sm btn-primary"> show </a></td>
        <td> <a href="{{ route('sales.edit', $sa->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
        <td>        
        	{!! Form::open(['method' => 'DELETE', 'route' => ['sales.destroy', $sa->id]]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
			{!! Form::close() !!}
		</td>
      </tr>
    @endforeach
</tbody>
</table>
{{ $objects->appends(Request::only('q'))->links() }}