<table class="table">
<thead>
  <tr>
    <th>Date</th>
    <th>Provider</th>
    <th>Show</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
	@foreach($objects as $pu)
      <tr>
        <td>{{$pu->created_at}}</td>
        <td>{{$pu->provider->name}}</td>
        <td> <a href="{{ route('purchases.show', $pu->id) }}" class="btn btn-sm btn-primary"> show </a></td>
        <td> <a href="{{ route('purchases.edit', $pu->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
        <td>        
        	{!! Form::open(['method' => 'DELETE', 'route' => ['purchases.destroy', $pu->id]]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
			{!! Form::close() !!}
		</td>
      </tr>
    @endforeach
</tbody>
</table>
{{ $objects->appends(Request::only('q'))->links() }}