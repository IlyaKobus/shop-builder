<div class="row">
    <div class="col-md-2">
        <ol class="selectable customer-data-list ui-selectable">

            <li class="ui-widget-content ui-selectee ui-selected"
                rel="customer-data-block-0">General
            </li>

            @foreach($customer->addresses as $address)
                <li class="ui-widget-content ui-selectee"
                    rel="customer-data-block-{{$loop->iteration}}">Address {{$loop->iteration}}
                    <span class="fa fa-minus-square pull-right text-red"></span>
                </li>
            @endforeach

        </ol>

        <button class="btn btn-block btn-primary btn-add-address" title="Edit">ADD</button>

    </div>

    <div class="col-md-10 customer-data-block__wrapper">

        {{-- General data Block --}}
        <div class="customer-data-block" id="customer-data-block-0" style="display: block;">

            <fieldset>
                <legend>Customer Details</legend>

                <div class="form-group @if($errors->has('customer_group_id')) has-error @endif">

                    {{ Form::label('customer_group_id', 'Customer Group', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::select('customer_group_id', ViewDataHelper::getCustomerGroupSelect(), null, ['class' => 'form-control', 'required']) }}

                        @if($errors->has('customer_group_id'))
                            <span class="help-block">{{ $errors->first('customer_group_id') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('first_name')) has-error @endif">

                    {{ Form::label('first_name', 'First Name', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name', 'required']) }}

                        @if($errors->has('first_name'))
                            <span class="help-block">{{ $errors->first('first_name') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('last_name')) has-error @endif">

                    {{ Form::label('last_name', 'Last Name', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required']) }}

                        @if($errors->has('last_name'))
                            <span class="help-block">{{ $errors->first('last_name') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('email')) has-error @endif">

                    {{ Form::label('email', 'E-Mail', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail', 'required']) }}

                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('phone')) has-error @endif">

                    {{ Form::label('phone', 'Telephone', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Telephone', 'required']) }}

                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
                        @endif

                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend>Password</legend>

                <div class="form-group @if($errors->has('password')) has-error @endif">

                    {{ Form::label('password', 'Password', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

                        @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has('password_confirm')) has-error @endif">

                    {{ Form::label('password_confirm', 'Confirm', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::password('password_confirm', ['class' => 'form-control', 'placeholder' => 'Confirm']) }}

                        @if($errors->has('password_confirm'))
                            <span class="help-block">{{ $errors->first('password_confirm') }}</span>
                        @endif

                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend>Other</legend>

                <div class="form-group @if($errors->has('is_mailable')) has-error @endif">

                    {{ Form::label('is_mailable', 'Newsletter', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">

                        <label>
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                {{ Form::checkbox('is_mailable', 1, true, ['hidden']) }}
                                <ins class="iCheck-helper"></ins>
                            </div>
                        </label>

                        @if($errors->has('is_mailable'))
                            <span class="help-block">{{ $errors->first('is_mailable') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has('status')) has-error @endif">

                    {{ Form::label('status', 'Status', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::select('status', ViewDataHelper::getCustomerStatuses(), null, ['class' => 'form-control']) }}

                        @if($errors->has('status'))
                            <span class="help-block">{{ $errors->first('status') }}</span>
                        @endif

                    </div>
                </div>

            </fieldset>

        </div>
        {{-- End General data Block --}}

        {{-- Addresses Block --}}
        @foreach($customer->addresses as $address)
            <div class="customer-data-block" id="customer-data-block-{{$loop->iteration}}" style="display: none;">

                <div class="form-group required @if($errors->has("addresses[{$loop->iteration}][first_name]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][first_name]", 'First Name', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][first_name]", $address->first_name, ['class' => 'form-control', 'placeholder' => 'First Name']) }}

                        @if($errors->has("addresses[{$loop->iteration}][first_name]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][first_name]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has("addresses[{$loop->iteration}][last_name]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][last_name]", 'Last Name', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][last_name]", $address->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}

                        @if($errors->has("addresses[{$loop->iteration}][last_name]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][last_name]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has("addresses[{$loop->iteration}][company]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][company]", 'Company', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][company]", $address->company, ['class' => 'form-control', 'placeholder' => 'Company']) }}

                        @if($errors->has("addresses[{$loop->iteration}][company]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][company]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has("addresses[{$loop->iteration}][address]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][address]", 'Address', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][address]", $address->address, ['class' => 'form-control', 'placeholder' => 'Address']) }}

                        @if($errors->has("addresses[{$loop->iteration}][address]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][address]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has("addresses[{$loop->iteration}][city]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][city]", 'City', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][city]", $address->city, ['class' => 'form-control', 'placeholder' => 'City']) }}

                        @if($errors->has("addresses[{$loop->iteration}][city]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][city]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has("addresses[{$loop->iteration}][postcode]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][postcode]", 'Postcode', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][postcode]", $address->postcode, ['class' => 'form-control', 'placeholder' => 'Postcode']) }}

                        @if($errors->has("addresses[{$loop->iteration}][postcode]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][postcode]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has("addresses[{$loop->iteration}][country]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][country]", 'Country', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][country]", $address->country, ['class' => 'form-control', 'placeholder' => 'Country']) }}

                        @if($errors->has("addresses[{$loop->iteration}][country]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][country]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has("addresses[{$loop->iteration}][region]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][region]", 'Region / State', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("addresses[{$loop->iteration}][region]", $address->region, ['class' => 'form-control', 'placeholder' => 'Region / State']) }}

                        @if($errors->has("addresses[{$loop->iteration}][region]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][region]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has("addresses[{$loop->iteration}][is_default]")) has-error @endif">

                    {{ Form::label("addresses[{$loop->iteration}][is_default]", 'Default Address', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">

                        <label>
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                {{ Form::checkbox("addresses[{$loop->iteration}][is_default]", 1, $address->is_default, ['hidden']) }}
                                <ins class="iCheck-helper"></ins>
                            </div>
                        </label>

                        @if($errors->has("addresses[{$loop->iteration}][is_default]"))
                            <span class="help-block">{{ $errors->first("addresses[{$loop->iteration}][is_default]") }}</span>
                        @endif

                    </div>
                </div>

            </div>
        @endforeach
        {{-- End Addresses Block --}}

    </div>
</div>
