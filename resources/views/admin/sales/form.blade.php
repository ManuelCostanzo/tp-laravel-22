{{ Html::script('js/admin.js') }}

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {{ Form::label('description', null, ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'required']) }}
    
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>

@if ($action == 'create' and is_null(old('product_id')))
	@include('admin.purchases/one_product')
@else
	@include('admin.purchases/many_products')
@endif