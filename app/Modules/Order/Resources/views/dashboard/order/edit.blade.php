@extends('layouts.dashboard')

@section('content_title', 'Orders')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit Order</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($order, ['route' => ['orders.store', $order->id], 'method' => 'post', 'class'=> 'form-horizontal', 'files' => true]) !!}
        <div class="box-body">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_customer_details" data-toggle="tab" aria-expanded="true">1.
                            Customer Details</a></li>
                    <li class=""><a href="#tab_products" data-toggle="tab">2. Products</a></li>
                    <li class=""><a href="#tab_payment" data-toggle="tab">3. Payment Details</a></li>
                    <li class=""><a href="#tab_shipment" data-toggle="tab">4. Shipping Details</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="tab_customer_details">

                        <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                            {{ Form::label("currency_id", 'Currency', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::select("currency_id", ViewDataHelper::getCurrenciesSelect(), null, ['class' => 'form-control', 'required']) }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group v-center @if($errors->has('name')) has-error @endif">

                            {{ Form::label("customer_id", 'Customer', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::select("customer_id", [$order->customer->id => $order->customer->name], $order->customer->id, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group v-center @if($errors->has('name')) has-error @endif">

                            {{ Form::label("customer_group_id", 'Customer Group', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::select("customer_group_id", ViewDataHelper::getCustomerGroupSelect(), $order->customer->group->id, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                            {{ Form::label("first_name", 'First Name', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("first_name", $order->customer->first_name, ['class' => 'form-control', 'placeholder' => 'First Name', 'required']) }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                            {{ Form::label("last_name", 'Last Name', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("last_name", $order->customer->last_name, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required']) }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                            {{ Form::label("email", 'E-Mail', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("email", $order->customer->email, ['class' => 'form-control', 'placeholder' => 'E-Mail', 'required']) }}
                            </div>
                        </div>

                        <hr/>

                        <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                            {{ Form::label("phone", 'Telephone', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("phone", $order->customer->phone, ['class' => 'form-control', 'placeholder' => 'Telephone', 'required']) }}
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="tab_products">

                        <div class="row">
                            <div class="col-md-2">
                                <ol class="selectable product-data-list ui-selectable">

                                </ol>

                                {{ Form::select('product_id', [], null, ['class' => 'form-control']) }}

                                <button class="btn btn-block btn-primary btn-order-add-product" data-type="left"
                                        title="Add">ADD
                                </button>

                            </div>

                            <div class="col-md-10 product-data-block__wrapper">

                                @foreach($order->products as $product)
                                    <div class="product-data-block" id="product-data-block-{{$loop->index}}"
                                         @if(!$loop->first) style="display: none;" @endif>

                                        <fieldset>
                                            <legend>General</legend>
                                            <div class="form-group required @if($errors->has('name')) has-error @endif">

                                                {{ Form::label("products[{$product->id}][{$loop->index}][quantity]", 'Quantity', ['class' => 'col-md-2 control-label']) }}

                                                <div class="col-md-10">
                                                    {{ Form::number("products[{$product->id}][{$loop->index}][quantity]", $product->quantity, ['class' => 'form-control', 'min' => '1']) }}

                                                    @if($errors->has('name'))
                                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset>
                                            <legend>Options</legend>

                                            @foreach($product->options as $option)

                                                <div class="form-group required @if($errors->has('name')) has-error @endif">

                                                    {{ Form::label("products[options]", $option->name, ['class' => 'col-md-2 control-label']) }}

                                                    <div class="col-md-10">
                                                        {{ Form::text("products[{$option->id}][{$loop->parent->index}][options][{$loop->index}][value]", $option->value, ['class' => 'form-control']) }}

                                                        @if($errors->has('name'))
                                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                                        @endif

                                                    </div>

                                                    {{ Form::hidden("products[{$option->id}][{$loop->parent->index}][options][{$loop->index}][name]", $option->name) }}
                                                </div>

                                                @if(!$loop->last)
                                                    <hr/>
                                                @endif
                                            @endforeach

                                        </fieldset>

                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="tab_payment">
                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('payment_id', 'Method', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::select('payment_id', ViewDataHelper::getPaymentsSelect(), null, ['class' => 'form-control']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label("customer_payment_address_id", 'Customer Address', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::select('customer_payment_address_id', [], null, ['class' => 'form-control']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('payment[address]', 'Address', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text('payment[address]', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('payment[city]', 'City', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text('payment[city]', null, ['class' => 'form-control', 'placeholder' => 'City']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('payment[postcode]', 'Postcode', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text('payment[postcode]', null, ['class' => 'form-control', 'placeholder' => 'Postcode']) }}

                                @if($errors->has('postcode'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('payment[country]', 'Country', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("payment[country]", null, ['class' => 'form-control', 'placeholder' => 'Country']) }}

                                @if($errors->has('postcode'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('payment[region]', 'Region / State', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("payment[region]", null, ['class' => 'form-control', 'placeholder' => 'Region / State']) }}

                                @if($errors->has('postcode'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="tab_shipment">

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('shipment_id', 'Method', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::select('shipment_id', ViewDataHelper::getShipmentsSelect(), null, ['class' => 'form-control']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label("customer_shipping_address_id", 'Customer Address', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::select('customer_shipping_address_id', [], null, ['class' => 'form-control']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('shipping[address]', 'Address', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text('shipping[address]', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('shipping[city]', 'City', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text('shipping[city]', null, ['class' => 'form-control', 'placeholder' => 'City']) }}

                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('shipping[postcode]', 'Postcode', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text('shipping[postcode]', null, ['class' => 'form-control', 'placeholder' => 'Postcode']) }}

                                @if($errors->has('postcode'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('shipping[country]', 'Country', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("shipping[country]", null, ['class' => 'form-control', 'placeholder' => 'Country']) }}

                                @if($errors->has('postcode'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                        <hr/>

                        <div class="form-group required @if($errors->has('name')) has-error @endif">

                            {{ Form::label('shipping[region]', 'Region / State', ['class' => 'col-md-2 control-label']) }}

                            <div class="col-md-10">
                                {{ Form::text("shipping[region]", null, ['class' => 'form-control', 'placeholder' => 'Region / State']) }}

                                @if($errors->has('postcode'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                        </div>

                    </div>

                </div>

                <!-- /.tab-content -->
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::submit('Create', ['class' => 'btn btn-info pull-right']) }}
        </div>

        <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
@endsection