<div class="tab-data">

    <div class="form-group @if($errors->has('model')) has-error @endif">

        {{ Form::label('status', 'Status', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('status', ViewDataHelper::getProductStatuses(), null, ['class' => 'form-control']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group required @if($errors->has('model')) has-error @endif">

        {{ Form::label('model', 'Model', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text('model', null, ['class' => 'form-control', 'placeholder' => 'Model', 'required']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has('model')) has-error @endif">

        {{ Form::label('currency_id', 'Currency', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('currency_id', ViewDataHelper::getCurrenciesSelect(), null, ['class' => 'form-control']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

    <div class="form-group @if($errors->has('model')) has-error @endif">

        {{ Form::label('price', 'Price', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

    <hr/>


    <div class="form-group @if($errors->has('model')) has-error @endif">

        {{ Form::label('discount_price', 'Discount Price', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text('discount_price', null, ['class' => 'form-control', 'placeholder' => 'Discount Price']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has('parent_id')) has-error @endif">

        {{ Form::label('is_discounted', 'Discount Price', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            <label>
                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                    {{ Form::checkbox('is_discounted', 1, null, ['hidden']) }}
                    <ins class="iCheck-helper"></ins>
                </div>
            </label>
        </div>
    </div>

    <hr/>


    <div class="form-group @if($errors->has('model')) has-error @endif">

        {{ Form::label('quantity', 'Quantity', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Quantity']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has('model')) has-error @endif">

        {{ Form::label('weight', 'Weight', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::number('weight', null, ['class' => 'form-control', 'placeholder' => 'Weight']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

</div>