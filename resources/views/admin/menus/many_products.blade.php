@if ($action == 'create' or !is_null(old('product_id'))) @php $old_products = old('product_id'); @endphp @else @php $old_products = $object->products; @endphp  @endif
    
@foreach ($old_products as $key => $pr)
	<div class="entry form-group{{ ($errors->has('product_id.' . $key . '.pr')) ? ' has-error' : '' }}">
		{{ Form::label('product_id', 'Select Product:', ['class' => 'col-md-4 control-label']) }}
		<div class="col-md-6 input-group">
			@if (is_null(old('product_id')))
				{!! Form::select('product_id[][pr]', $products, $pr->id, ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
			@else
				{!! Form::select('product_id[][pr]', $products, $pr, ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
			@endif
	    	<span class="input-group-btn">
	            <button class="btn @if ($loop->last) btn-success btn-add @else btn-danger btn-remove @endif" type="button">
	                <i class="fa @if ($loop->last) fa-plus @else fa-minus @endif"></i>
	            </button>
	        </span>                            
	    </div>
		@if ($errors->has('product_id.' . $key . '.pr'))
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
			    <span class="text-danger">
			        <strong>{{ $errors->first('product_id.' . $key . '.pr') }}</strong>
			    </span>
			</div>
		</div>
		@endif 
	</div>
@endforeach
