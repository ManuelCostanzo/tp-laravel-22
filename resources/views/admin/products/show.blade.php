@extends('admin.layouts.default')

@section('admin-content')

	<h1>{{$product->name }}</h1>
	<hr>

	<h2>Datas</h1>
	<li>BARCODE: {{$product->barcode}}</li>
	<li>STOCK: {{$product->sotck}}</li>
	<li>MINIMUM_STOCK: {{$product->minimum_stock}}</li>
	<li>UNIT_PRICE: ${{$product->unit_price}}</li>
	<li>DESCRIPTION: <p>{{$product->description}}</p></li>
	<li>IMAGE: {{ Html::image(Storage::disk('uploads')->url($product->image), $product->name) }}</li>
	<li>BRAND: {{$product->brand->name}}</li>
	<li>CATEGORY: {{$product->category->name}}</li>
	<li>PROVIDER: {{$product->provider->name}}</li>
	<li>CREADO EL: {{$product->created_at}}</li>
	<li>MODIFICADO EL: {{$product->updated_at}}</li>

	<a href="{{ route('products.index') }}" class="btn btn-info">Back to all products</a>
	<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit product</a>

	<div class="pull-right">

        {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id]]) !!}
            {!! Form::submit('Delete this product?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	</div>
@endsection