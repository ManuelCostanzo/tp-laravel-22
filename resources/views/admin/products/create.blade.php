@extends('admin.layouts.default')

@section('admin-content')

    <div class="panel panel-default">
        <div class="panel-heading">Create Product</div>
        <div class="panel-body">
            {!! Form::open(['url' => route('products.store'), 'class' => 'form-horizontal', 'files' => true]) !!}

                @include('admin/products/form')
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection