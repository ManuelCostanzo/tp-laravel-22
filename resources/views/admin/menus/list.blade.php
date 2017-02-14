<table class="table">
<thead>
  <tr>
    <th>Date</th>
    <th>Show</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
	@foreach($objects as $da)
      <tr>
        <td>{{$da->date}}</td>
        <td> <a href="{{ route('menus.show', $da->id) }}" class="btn btn-sm btn-primary"> show </a></td>
        <td> <a href="{{ route('menus.edit', $da->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
        <td>        
        	{!! Form::open(['method' => 'DELETE', 'route' => ['menus.destroy', $da->id]]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
			{!! Form::close() !!}
		</td>
      </tr>
    @endforeach
</tbody>
</table>
{{ $objects->appends(Request::only('q'))->links() }}