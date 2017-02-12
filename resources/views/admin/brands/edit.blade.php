@extends('admin.layouts.default')

@section('admin-content')

    <div class="panel panel-default">
        <div class="panel-heading">Edit Brand</div>
        <div class="panel-body">
            {!! Form::model($brand, ['method' => 'PATCH', 'url' => route('brands.update', $brand->id), 'class' => 'form-horizontal']) !!}

                @include('admin/brands/form')
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection