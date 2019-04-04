@extends('layouts.dashboard')

@section('content_title', 'Products')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create product</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'put', 'class'=> 'form-horizontal', 'files' => true]) !!}
        <div class="box-body">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_general" data-toggle="tab" aria-expanded="true">General</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="tab_general">
                        @include('dashboard.customer.edit.general')
                    </div>

                </div>

                <!-- /.tab-content -->
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::submit('Save', ['class' => 'btn btn-info pull-right']) }}
        </div>

        {!! Form::hidden('category_id') !!}

    <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
@endsection
