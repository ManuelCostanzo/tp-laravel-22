<table class="table">
<thead>
  <tr>
    <th>Provider</th>
    <th>CUIT</th>
    <th>Show</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
	@foreach($objects as $pr)
      <tr>
        <td>{{$pr->name}}</td>
        <td>{{$pr->cuit}}</td>
        <td> <a href="{{ route('providers.show', $pr->id) }}" class="btn btn-sm btn-primary"> show </a></td>
        <td> <a href="{{ route('providers.edit', $pr->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
        <td>        
        	{!! Form::open(['method' => 'DELETE', 'route' => ['providers.destroy', $pr->id]]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
			{!! Form::close() !!}
		</td>
      </tr>
    @endforeach
</tbody>
</table>
{{ $objects->appends(Request::only('q'))->links() }}
</div>
</div>