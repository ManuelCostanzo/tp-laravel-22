<table class="table">
<thead>
  <tr>
    <th>Role</th>
    <th>Show</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
	@foreach($roles as $role)
      <tr>
        <td>{{$role->name}}</td>
        <td> <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-primary"> show </a></td>
        <td> <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
        <td>        
        	{!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id]]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
			{!! Form::close() !!}
		</td>
      </tr>
    @endforeach
</tbody>
</table>
{{ $roles->appends(Request::only('q'))->links() }}
</div>
</div>