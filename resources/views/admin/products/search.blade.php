<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div id="imaginary_container">
        {!! Form::open(['method' => 'GET', 'url' => route('products.search'), 'class' => 'form-horizontal']) !!} 
            <div class="input-group">
                {{ Form::text('q', old('q'), ['class' => 'form-control', 'placeholder' => 'Search...', 'required']) }}
                <span class="input-group-addon">
                    <button type="submit">
                        <span class="fa fa-search"></span>
                    </button>  
                </span>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>