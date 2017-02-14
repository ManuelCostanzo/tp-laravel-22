@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$object->date }}</h1>
	<hr>
	<h2> PROVIDER </h2> <li>{{$object->provider->name}}</li>
	<h2> PRODUCTS </h2>
	@foreach ($object->products as $pr)
		<li> NAME: {{$pr->name}} </li>
		<li> QUIANTITY: {{$pr->quantity}} </li>
		<li> TOTAL PRICE: {{$pr->quantity * $pr->product->unit_price}} </li>
	@endforeach
	<br><br>
	<li>CREATED AT: {{$object->created_at}}</li>
	<li>UPDATED AT: {{$object->updated_at}}</li>

	<a href="{{ route('purchases.index') }}" class="btn btn-info">Back to all purchases</a>
	<a href="{{ route('purchases.edit', $object->id) }}" class="btn btn-primary">Edit Purchase</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['purchases.destroy', $object->id]]) !!}
            {!! Form::submit('Delete this menu?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection