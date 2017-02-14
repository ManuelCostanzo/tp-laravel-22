@if ($errors->has('product_id'))
<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
	    <span class="text-danger">
	        <strong>{{ $errors->first('product_id') }}</strong>
	    </span>
	</div>
</div>
@endif    
@foreach ($object->products as $pr)
	<div class="entry form-group">
		{{ Form::label('product_id', 'Select Product:', ['class' => 'col-md-4 control-label']) }}
		<div class="col-md-6 input-group">
			{!! Form::select('product_id[]', $products, $pr->id, ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
	    	<span class="input-group-btn">
	            <button class="btn @if ($loop->last) btn-success btn-add @else btn-danger btn-remove @endif" type="button">
	                <i class="fa @if ($loop->last) fa-plus @else fa-minus @endif"></i>
	            </button>
	        </span>                            
	    </div>
	</div>
@endforeach
