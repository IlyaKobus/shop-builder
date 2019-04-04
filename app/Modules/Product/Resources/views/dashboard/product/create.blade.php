@extends('layouts.dashboard')

@section('content_title', 'Products')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create product</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route' => 'products.store', 'method' => 'post', 'class'=> 'form-horizontal', 'files' => true]) !!}
        <div class="box-body">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_general" data-toggle="tab" aria-expanded="true">General</a></li>
                    <li class=""><a href="#tab_data" data-toggle="tab" aria-expanded="false">Data</a></li>
                    <li class=""><a href="#tab_links" data-toggle="tab" aria-expanded="false">Links</a></li>
                    <li class=""><a href="#tab_attribute" data-toggle="tab" aria-expanded="false">Attribute</a></li>
                    <li class=""><a href="#tab_option" data-toggle="tab" aria-expanded="false">Option</a></li>
                    <li class=""><a href="#tab_image" data-toggle="tab" aria-expanded="false">Image</a></li>
                    <li class=""><a href="#tab_design" data-toggle="tab" aria-expanded="false">Design</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="tab_general">
                        @include('dashboard.product.create.general')
                    </div>

                    <div class="tab-pane" id="tab_data">
                        @include('dashboard.product.create.data')
                    </div>

                    <div class="tab-pane" id="tab_links">
                        @include('dashboard.product.create.links')
                    </div>

                    <div class="tab-pane" id="tab_attribute">
                        @include('dashboard.product.create.attributes')
                    </div>

                    <div class="tab-pane" id="tab_option">
                        @include('dashboard.product.create.options')
                    </div>

                    <div class="tab-pane" id="tab_image">
                        @include('dashboard.product.create.images')
                    </div>

                    <div class="tab-design" id="tab_design">
                        @include('dashboard.product.create.design')
                    </div>

                </div>

                <!-- /.tab-content -->
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::submit('Create', ['class' => 'btn btn-info pull-right']) }}
        </div>

        {!! Form::hidden('category_id') !!}

    <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
@endsection
