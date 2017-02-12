@foreach(['name', 'barcode', 'image'] as $value)
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

@foreach(['stock', 'minimum_stock', 'unit_price'] as $value)
    <div class="form-group{{ $errors->has($value) ? ' has-error' : '' }}">
        {{ Form::label($value, null, ['class' => 'col-md-4 control-label']) }}

        <div class="col-md-6">
            {{ Form::number($value, old($value), ['class' => 'form-control', 'required']) }}
        
            @if ($errors->has($value))
                <span class="help-block">
                    <strong>{{ $errors->first($value) }}</strong>
                </span>
            @endif
        </div>
    </div>
@endforeach


 <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
    {{ Form::label('category_id', 'Select category:', ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}

        @if ($errors->has('category_id'))
            <span class="help-block">
                <strong>{{ $errors->first('category_id') }}</strong>
            </span>
        @endif                                
    </div>
</div>

 <div class="form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
    {{ Form::label('brand_id', 'Select brand:', ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {!! Form::select('brand_id', $brands, old('brand_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}

        @if ($errors->has('brand_id'))
            <span class="help-block">
                <strong>{{ $errors->first('brand_id') }}</strong>
            </span>
        @endif                                
    </div>
</div>

 <div class="form-group{{ $errors->has('provider_id') ? ' has-error' : '' }}">
    {{ Form::label('provider_id', 'Select provider:', ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {!! Form::select('provider_id', $providers, old('provider_id'), ['class' => 'form-control', 'placeholder' => '-----', 'required']) !!}

        @if ($errors->has('provider_id'))
            <span class="help-block">
                <strong>{{ $errors->first('provider_id') }}</strong>
            </span>
        @endif                                
    </div>
</div>

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
