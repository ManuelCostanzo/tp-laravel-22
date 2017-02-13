@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$object->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>BARCODE: {{$object->barcode}}</li>
	<li>STOCK: {{$object->sotck}}</li>
	<li>MINIMUM_STOCK: {{$object->minimum_stock}}</li>
	<li>UNIT_PRICE: ${{$object->unit_price}}</li>
	<li>DESCRIPTION: <p>{{$object->description}}</p></li>
	<li>IMAGE: {{ Html::image(Storage::disk('uploads')->url($object->image), $object->name) }}</li>
	<li>BRAND: {{$object->brand->name}}</li>
	<li>CATEGORY: {{$object->category->name}}</li>
	<li>PROVIDER: {{$object->provider->name}}</li>
	<li>CREADO EL: {{$object->created_at}}</li>
	<li>MODIFICADO EL: {{$object->updated_at}}</li>

	<a href="{{ route('products.index') }}" class="btn btn-info">Back to all products</a>
	<a href="{{ route('products.edit', $object->id) }}" class="btn btn-primary">Edit product</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $object->id]]) !!}
            {!! Form::submit('Delete this product?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection