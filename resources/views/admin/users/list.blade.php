<table class="table">
<thead>
  <tr>
    <th>Nick</th>
    <th>Email</th>
    <th>Name</th>
    <th>Role</th>
    <th>Status</th>
    <th>Show</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
	@foreach($objects as $us)
      <tr>
        <td>{{$us->nick}}</td>
        <td>{{$us->email}}</td>
        <td>{{$us->name}}</td>
        <td>{{$us->role->name}}</td>
        <td>{{($us->enabled) ? 'enabled' : 'bloqued'}}</td>
        <td> <a href="{{ route('users.show', $us->id) }}" class="btn btn-sm btn-primary"> show </a></td>
        <td> <a href="{{ route('users.edit', $us->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
        <td>        
        	{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $us->id]]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
			{!! Form::close() !!}
		</td>
      </tr>
    @endforeach
</tbody>
</table>
{{ $objects->appends(Request::only('q'))->links() }}