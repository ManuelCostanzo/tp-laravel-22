{{ Html::script('js/admin.js') }}

<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
    {{ Form::label('date', null, ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {!! Form::date('date', old('date'),['class' => 'form-control', 'required']) !!}
    
        @if ($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>
</div>

@if ($action == 'create' and is_null(old('product_id')))
	@include('admin.menus/one_product')
@else
	@include('admin.menus/many_products')
@endif