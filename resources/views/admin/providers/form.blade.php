@foreach(['name', 'cuit'] as $value)
    <div class="form-group{{ $errors->has($value) ? ' has-error' : '' }}">
        {{ Form::label($value, null, ['class' => 'col-md-4 control-label']) }}

        <div class="col-md-6">
            {{ Form::text($value, old($value), ['class' => 'form-control', 'required']) }}
        
            @if ($errors->has($value))
                <span class="help-block">
                    <strong>{{ $errors->first($value) }}</strong>
                </span>
            @endif
        </div>
    </div>
@endforeach