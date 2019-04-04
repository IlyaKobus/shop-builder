<div class="customer-data-block" id="customer-data-block-{{$index}}" style="display: none;">

    <div class="form-group required @if($errors->has('name')) has-error @endif">

        {{ Form::label('first_name', 'First Name', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][first_name]", null, ['class' => 'form-control', 'placeholder' => 'First Name']) }}

            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group required @if($errors->has("addresses[{$index}][last_name]")) has-error @endif">

        {{ Form::label("addresses[{$index}][last_name]", 'Last Name', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][last_name]", null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}

            @if($errors->has("addresses[{$index}][last_name]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][last_name]") }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has("addresses[{$index}][company]")) has-error @endif">

        {{ Form::label("addresses[{$index}][company]", 'Company', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][company]", null, ['class' => 'form-control', 'placeholder' => 'Company']) }}

            @if($errors->has("addresses[{$index}][company]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][company]") }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group required @if($errors->has("addresses[{$index}][address]")) has-error @endif">

        {{ Form::label("addresses[{$index}][address]", 'Address', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][address]", null, ['class' => 'form-control', 'placeholder' => 'Address']) }}

            @if($errors->has("addresses[{$index}][address]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][address]") }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group required @if($errors->has("addresses[{$index}][city]")) has-error @endif">

        {{ Form::label("addresses[{$index}][city]", 'City', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][city]", null, ['class' => 'form-control', 'placeholder' => 'City']) }}

            @if($errors->has("addresses[{$index}][city]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][city]") }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group required @if($errors->has("addresses[{$index}][postcode]")) has-error @endif">

        {{ Form::label("addresses[{$index}][postcode]", 'Postcode', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][postcode]", null, ['class' => 'form-control', 'placeholder' => 'Postcode']) }}

            @if($errors->has("addresses[{$index}][postcode]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][postcode]") }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group required @if($errors->has("addresses[{$index}][country]")) has-error @endif">

        {{ Form::label("addresses[{$index}][country]", 'Country', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][country]", null, ['class' => 'form-control', 'placeholder' => 'Country']) }}

            @if($errors->has("addresses[{$index}][country]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][country]") }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group required @if($errors->has("addresses[{$index}][region]")) has-error @endif">

        {{ Form::label("addresses[{$index}][region]", 'Region / State', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("addresses[{$index}][region]", null, ['class' => 'form-control', 'placeholder' => 'Region / State']) }}

            @if($errors->has("addresses[{$index}][region]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][region]") }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has("addresses[{$index}][is_default]")) has-error @endif">

        {{ Form::label("addresses[{$index}][is_default]", 'Default Address', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">

            <label>
                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                    {{ Form::checkbox("addresses[{$index}][is_default]", 1, false, ['hidden']) }}
                    <ins class="iCheck-helper"></ins>
                </div>
            </label>

            @if($errors->has("addresses[{$index}][is_default]"))
                <span class="help-block">{{ $errors->first("addresses[{$index}][is_default]") }}</span>
            @endif

        </div>
    </div>

</div>
