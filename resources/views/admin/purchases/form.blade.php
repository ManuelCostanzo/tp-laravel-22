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


@if ($action == 'create')
	<div class="entry form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
		{{ Form::label('product_id', 'Select Product:', ['class' => 'col-md-4 control-label']) }}
		<div class="col-md-6">
			<div class="input-group">
				<div class="col-md-8">
					{!! Form::select('product_id[]', $products, old('product_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
				</div>

				<div class="col-md-4">
					{!! Form::number('quantity[]', null, ['class' => 'form-control', 'required']) !!}
				</div>
		    	<span class="input-group-btn">
		            <button class="btn btn-success btn-add" type="button">
		                <i class="fa fa-plus"></i>
		            </button>
		        </span>
		     </div>

	        @if ($errors->has('product_id'))
	            <span class="help-block">
	                <strong>{{ $errors->first('product_id') }}</strong>
	            </span>
	        @endif
	        @if ($errors->has('quantity'))
	            <span class="help-block">
	                <strong>{{ $errors->first('quantity') }}</strong>
	            </span>
	        @endif                              
	    </div>
	</div>
@else
	@include('admin.purchases/edit_products')
@endif