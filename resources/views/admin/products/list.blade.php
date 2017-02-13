<table class="table">
<thead>
  <tr>
    <th>Product</th>
    <th>Category</th>
    <th>Brand</th>
    <th>Unit Price</th>
    <th>Show</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
	@foreach($objects as $pr)
      <tr>
        <td>{{$pr->name}}</td>
        <td>{{$pr->category->name}}</td>
        <td>{{$pr->brand->name}}</td>
        <td>${{$pr->unit_price}}</td>
        <td> <a href="{{ route('products.show', $pr->id) }}" class="btn btn-sm btn-primary"> show </a></td>
        <td> <a href="{{ route('products.edit', $pr->id) }}" class="btn btn-sm btn-warning"> edit </a></td>
        <td>        
        	{!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $pr->id]]) !!}
    			{!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
			{!! Form::close() !!}
		</td>
      </tr>
    @endforeach
</tbody>
</table>
{{ $objects->appends(Request::only('q'))->links() }}