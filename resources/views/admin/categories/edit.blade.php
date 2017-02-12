@extends('admin.layouts.default')

@section('admin-content')

    <div class="panel panel-default">
        <div class="panel-heading">Edit Category</div>
        <div class="panel-body">
            {!! Form::model($category, ['method' => 'PATCH', 'url' => route('categories.update', $category->id), 'class' => 'form-horizontal']) !!}

                @include('admin/categories/form')
                
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection