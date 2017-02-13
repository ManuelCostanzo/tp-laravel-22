<div class="panel panel-default">
    <div class="panel-heading">Create {{$object_name}}</div>
    <div class="panel-body">
        @if ($action == 'create')
            {!! Form::open(['url' => route($route . '.store'), 'class' => 'form-horizontal']) !!}
        @else
            {!! Form::model($object, ['method' => 'PATCH', 'url' => route($route . '.update', $object->id), 'class' => 'form-horizontal']) !!}
        @endif

            @include('admin/' . $route . '/form')
            
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>