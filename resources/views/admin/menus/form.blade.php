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

@if ($action == 'create')
	<div class="entry form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
		{{ Form::label('product_id', 'Select Product:', ['class' => 'col-md-4 control-label']) }}
		<div class="col-md-6">
			<div class="input-group">
				{!! Form::select('product_id[]', $products, old('product_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
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
	    </div>
	</div>
@else
	@include('admin.menus/edit_products')
@endif