<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {{ Form::label('title', null, ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::text('title', old('title'), ['class' => 'form-control', 'required']) }}
    
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
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

<div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
    {{ Form::label('contact_email', null, ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::email('contact_email', old('contact_email'), ['class' => 'form-control', 'required']) }}
    
        @if ($errors->has('contact_email'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('items_per_page') ? ' has-error' : '' }}">
    {{ Form::label('items_per_page', null, ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::number('items_per_page', old('items_per_page'), ['class' => 'form-control', 'required']) }}
    
        @if ($errors->has('items_per_page'))
            <span class="help-block">
                <strong>{{ $errors->first('items_per_page') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('site_enabled') ? ' has-error' : '' }}">
    {{ Form::label('site_enabled', null , ['class' => 'col-md-4 control-label']) }}
    <div class="col-md-6">
        Yes: {!! Form::radio('site_enabled', 1, true) !!}
        No: {!! Form::radio('site_enabled', 0, false) !!}

        @if ($errors->has('site_enabled'))
            <span class="help-block">
                <strong>{{ $errors->first('site_enabled') }}</strong>
            </span>
        @endif                                
    </div>
</div>

<div class="form-group{{ $errors->has('maintenance_message') ? ' has-error' : '' }}">
    {{ Form::label('maintenance_message', null, ['class' => 'col-md-4 control-label']) }}

    <div class="col-md-6">
        {{ Form::textarea('maintenance_message', old('maintenance_message'), ['class' => 'form-control', 'required']) }}
    
        @if ($errors->has('maintenance_message'))
            <span class="help-block">
                <strong>{{ $errors->first('maintenance_message') }}</strong>
            </span>
        @endif
    </div>
</div>


