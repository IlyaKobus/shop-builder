<div class="row">
    <div class="col-md-2">
        <ol class="selectable customer-data-list ui-selectable">

            <li class="ui-widget-content ui-selectee ui-selected"
                rel="customer-data-block-0">General
            </li>

        </ol>

        <button class="btn btn-block btn-primary btn-add-address" title="Edit">ADD</button>

    </div>

    <div class="col-md-10 customer-data-block__wrapper">

        <div class="customer-data-block" id="customer-data-block-0" style="display: block;">

            <fieldset>
                <legend>Customer Details</legend>

                <div class="form-group @if($errors->has('customer_group_id')) has-error @endif">

                    {{ Form::label('customer_group_id', 'Customer Group', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::select('customer_group_id', ViewDataHelper::getCustomerGroupSelect(), null, ['class' => 'form-control']) }}

                        @if($errors->has('customer_group_id'))
                            <span class="help-block">{{ $errors->first('customer_group_id') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('first_name')) has-error @endif">

                    {{ Form::label('first_name', 'First Name', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) }}

                        @if($errors->has('first_name'))
                            <span class="help-block">{{ $errors->first('first_name') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('last_name')) has-error @endif">

                    {{ Form::label('last_name', 'Last Name', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) }}

                        @if($errors->has('last_name'))
                            <span class="help-block">{{ $errors->first('last_name') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('email')) has-error @endif">

                    {{ Form::label('email', 'E-Mail', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail']) }}

                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('phone')) has-error @endif">

                    {{ Form::label('phone', 'Telephone', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Telephone']) }}

                        @if($errors->has('phone'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
                        @endif

                    </div>
                </div>

            </fieldset>

            <fieldset>
                <legend>Password</legend>

                <div class="form-group required @if($errors->has('password')) has-error @endif">

                    {{ Form::label('password', 'Password', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

                        @if($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has('password_confirm')) has-error @endif">

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

    </div>
</div>
