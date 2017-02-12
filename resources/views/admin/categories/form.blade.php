<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{ Form::label('name', null, ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('name', old('name'), ['class' => 'form-control', 'required', 'autofocus']) }}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

 <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
    {{ Form::label('parent_id', 'Select parent (not required):', ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        {!! Form::select('parent_id', $categories, old('parent_id'), ['class' => 'form-control', 'placeholder' => '-----']) !!}

        @if ($errors->has('parent_id'))
            <span class="help-block">
                <strong>{{ $errors->first('parent_id') }}</strong>
            </span>
        @endif                                
    </div>
</div>
