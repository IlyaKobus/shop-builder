@extends('layouts.dashboard')

@section('content_title', 'Products')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit product</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put', 'class'=> 'form-horizontal', 'files' => true]) !!}
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
                        @include('dashboard.product.edit.general')
                    </div>

                    <div class="tab-pane" id="tab_data">
                        @include('dashboard.product.edit.data')
                    </div>

                    <div class="tab-pane" id="tab_links">
                        @include('dashboard.product.edit.links')
                    </div>

                    <div class="tab-pane" id="tab_attribute">
                        @include('dashboard.product.edit.attributes')
                    </div>

                    <div class="tab-pane" id="tab_option">
                        @include('dashboard.product.edit.options')
                    </div>

                    <div class="tab-pane" id="tab_image">
                        @include('dashboard.product.edit.images')
                    </div>

                    <div class="tab-pane" id="tab_design">
                        @include('dashboard.product.edit.design')
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