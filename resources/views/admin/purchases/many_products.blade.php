@if ($action == 'create' or !is_null(old('product_id'))) @php $old_products = old('product_id'); @endphp @else @php $old_products = $object->products; @endphp  @endif
@foreach ($old_products as $key => $pr)
	<div class="entry form-group{{ ($errors->has('product_id.' . $key . '.pr') or $errors->has('quantity.' . $key . '.qt')) ? ' has-error' : '' }}">
		{{ Form::label('product_id', 'Select Product:', ['class' => 'col-md-4 control-label']) }}
		<div class="col-md-6">
			<div class="input-group">
				<div class="col-md-8">
					@if (is_null(old('product_id')))
						{!! Form::select('product_id[][pr]', $products, $pr->id, ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
					@else
						{!! Form::select('product_id[][pr]', $products, $pr, ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}
					@endif
				</div>

				<div class="col-md-4">
					@if (is_null(old('product_id')))
						{!! Form::number('quantity[][qt]', $pr->pivot->quantity, ['class' => 'form-control']) !!}
					@else
						{!! Form::number('quantity[][qt]', old('quantity.' . $key . '.qt'), ['class' => 'form-control']) !!}
					@endif
				</div>
			</div>
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
		@if ($errors->has('quantity.' . $key . '.qt'))
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
			    <span class="text-danger">
			        <strong>{{ $errors->first('quantity.' . $key . '.qt') }}</strong>
			    </span>
			</div>
		</div>
		@endif   
	</div>
@endforeach
