@extends('layouts.dashboard')

@section('content_title', 'Orders')

@section('content')
    <div class="box box-primary">
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">

            <div class="row">

                <div class="col-md-4">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"><span class="fa fa-shopping-cart"></span> Order Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td style="width: 1%;"><a title="" class="btn btn-info btn-xs"
                                                              data-original-title="Date Added"><i
                                                    class="fa fa-calendar fa-fw"></i></a></td>
                                    <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                </tr>
                                <tr>
                                    <td><a data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                           data-original-title="Payment Method"><i class="fa fa-credit-card fa-fw"></i></a>
                                    </td>
                                    <td>{{ $order->payment->name }}</td>
                                </tr>
                                <tr>
                                    <td><a data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                           data-original-title="Shipping Method"><i class="fa fa-truck fa-fw"></i></a>
                                    </td>
                                    <td>{{ $order->shipment->name }}</td>
                                </tr>
                                <tr>
                                    <td><a data-toggle="tooltip" title="" class="btn btn-info btn-xs"
                                           data-original-title="Shipping Method"><i class="fa fa-dollar fa-fw"></i></a>
                                    </td>
                                    <td>{{ $order->currency->code }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"><span class="fa fa-user"></span> Customer Details</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td style="width: 1%;"><a class="btn btn-info btn-xs"><i
                                                    class="fa fa-user fa-fw"></i></a></td>
                                    <td><a href="{{ route('customers.edit', $order->customer->id) }}"
                                           target="_blank">{{ $order->customer->name }}</a></td>
                                </tr>
                                <tr>
                                    <td><a data-toggle="tooltip" class="btn btn-info btn-xs" title="Customer Group"><i
                                                    class="fa fa-group fa-fw"></i></a></td>
                                    <td>{{ $order->customer->group->name }}</td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-info btn-xs"><i class="fa fa-envelope-o fa-fw"></i></a></td>
                                    <td><a href="mailto:{{ $order->customer->email }}">{{ $order->customer->email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a class="btn btn-info btn-xs" title="Telephone"><i
                                                    class="fa fa-phone fa-fw"></i></a></td>
                                    <td>{{ $order->customer->phone }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->

                <div class="col-md-4">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"><span class="fa fa-cog"></span> Options</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"><span class="fa fa-info-circle"></span> Order (#{{ $order->id }})</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <table class="table order-addresses-table">
                                <thead>
                                <tr>
                                    <th>Payment Address</th>
                                    <th>Shipping Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $order->payment_address }}</td>
                                    <td>{{ $order->shipping_address }}</td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="table text-right order-products-table">
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Model</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php $total = 0.0; @endphp
                                @foreach($order->products as $product)
                                    @php $total += $product->quantity * $product->price; @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ $product->origin_id ? route('products.edit', $product->origin_id): '#' }}"
                                               target="_blank">{{ $product->name }}</a> <br/>
                                            @foreach($product->options as $option)
                                                <b>{{ $option->name }}</b>: {{ $option->value }} <br/>
                                            @endforeach
                                        </td>
                                        <td>{{ $product->model }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ number_format($product->quantity * $product->price, 2) }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="4">Total</td>
                                    <td>{{ number_format($total, 2) }}</td>
                                </tr>

                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-default box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title"><span class="fa fa-comment-o"></span> History</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="order-events-table-container">
                                <table class="table order-events-table">
                                    <thead>
                                    <tr>
                                        <th>Date Added</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Customer Notified</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($order->events as $event)
                                        <tr>
                                            <td>{{ date('d/m/Y', strtotime($event->created_at)) }}</td>
                                            <td>{{ $event->comment }}</td>
                                            <td>{{ ucfirst($event->status->name) }}</td>
                                            <td>{{ $event->is_notify_customer ? 'Yes' : 'No' }}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            {{ Form::open(['route' => ['orders.add-event', $order->id], 'method' => 'post', 'class'=> 'form-horizontal']) }}

                            <fieldset>
                                <legend>Add Order History</legend>

                                <div class="form-group @if($errors->has('name')) has-error @endif">

                                    {{ Form::label('status_id', 'Order status', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-10">
                                        {{ Form::select('status_id', ViewDataHelper::getOrderStatusSelect(), null, ['class' => 'form-control']) }}

                                        @if($errors->has('name'))
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('name')) has-error @endif">

                                    {{ Form::label('is_notify_customer', 'Notify Customer', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-10">
                                        <label>
                                            <div class="icheckbox_square-blue" aria-checked="false"
                                                 aria-disabled="false">
                                                {{ Form::checkbox('is_notify_customer', 1, true, ['hidden']) }}
                                                <ins class="iCheck-helper"></ins>
                                            </div>
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group @if($errors->has('name')) has-error @endif">

                                    {{ Form::label('comment', 'Comment', ['class' => 'col-md-2 control-label']) }}

                                    <div class="col-md-10">
                                        {{ Form::textarea('comment', null, ['class' => 'form-control']) }}

                                        @if($errors->has('name'))
                                            <span class="help-block">{{ $errors->first('name') }}</span>
                                        @endif

                                    </div>
                                </div>

                            </fieldset>

                            {{ Form::hidden('order_id', $order->id) }}

                            {{ Form::submit('Add Event', ['class' => 'btn btn-info pull-right btn-order-add-event']) }}

                        <!-- /.box-footer -->
                            {!! Form::close() !!}

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->

    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('.btn-order-add-event').on('click', function (e) {
                var _this = $(this);
                e.preventDefault();
                var $form = _this.closest('form');
                $.post(`/dashboard/orders/${$form.find('input[name=order_id]').val()}/event`, $form.serialize(), function (res) {
                    $('.order-events-table-container').html(res);
                });
            });
        });
    </script>
@endsection

