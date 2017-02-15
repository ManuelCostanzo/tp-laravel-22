<div class="entry form-group{{ ($errors->has('product_id.0.pr') or $errors->has('quantity.0.qt')) ? ' has-error' : '' }}">
	{{ Form::label('product_id', 'Select Product:', ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		<div class="input-group">
			<div class="col-md-8">
				{!! Form::select('product_id[][pr]', $products, old('product_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
			</div>

			<div class="col-md-4">
				{!! Form::number('quantity[][qt]', null, ['class' => 'form-control']) !!}
			</div>
	    	<span class="input-group-btn">
	            <button class="btn btn-success btn-add" type="button">
	                <i class="fa fa-plus"></i>
	            </button>
	        </span>
	     </div>

        @if ($errors->has('product_id.0.pr'))
            <span class="help-block">
                <strong>{{ $errors->first('product_id.0.pr') }}</strong>
            </span>
        @endif
        
        @if ($errors->has('quantity.0.qt'))
            <span class="help-block">
                <strong>{{ $errors->first('quantity.0.qt') }}</strong>
            </span>
        @endif                             
    </div>
</div>