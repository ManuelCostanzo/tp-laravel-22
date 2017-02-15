@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$object->created_at }}</h1>
	<hr>
	<h2> PRODUCTS </h2>
	@foreach ($object->products as $pr)
		<li> NAME: {{$pr->name}} </li>
		<li> QUIANTITY: {{$pr->pivot->quantity}} </li>
		<li> TOTAL PRICE: ${{$pr->pivot->quantity * $pr->pivot->unit_price}} </li>
	@endforeach

	<li>DESCRIPTION: {{$object->description}}</li>
	<li> TOTAL PRICE OF ALL: {{$total_price}}</li>
	<br><br>
	<li>CREATED AT: {{$object->created_at}}</li>
	<li>UPDATED AT: {{$object->updated_at}}</li>

	<a href="{{ route('sales.index') }}" class="btn btn-info">Back to all sales</a>
	<a href="{{ route('sales.edit', $object->id) }}" class="btn btn-primary">Edit Purchase</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['sales.destroy', $object->id]]) !!}
            {!! Form::submit('Delete this menu?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection