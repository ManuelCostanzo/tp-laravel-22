{{ Html::script('js/admin.js') }}

<div class="entry form-group{{ $errors->has('provider_id') ? ' has-error' : '' }}">
	{{ Form::label('provider_id', 'Select Provider:', ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		{!! Form::select('provider_id', $providers, old('provider_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}

        @if ($errors->has('provider_id'))
            <span class="help-block">
                <strong>{{ $errors->first('provider_id') }}</strong>
            </span>
        @endif                                
    </div>
</div>


<div class="form-group{{ $errors->has('image_bill') ? ' has-error' : '' }}">
    {{ Form::label('image_bill', 'Bill', ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::file('image_bill', ['class' => 'form-control']) }}
    
        @if ($errors->has('image_bill'))
            <span class="help-block">
                <strong>{{ $errors->first('image_bill') }}</strong>
            </span>
        @endif
    </div>
</div>

@if ($action == 'create' and is_null(old('product_id')))
	@include('admin.purchases/one_product')
@else
	@include('admin.purchases/many_products')
@endif