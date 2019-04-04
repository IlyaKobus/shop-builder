@extends('layouts.dashboard')

@section('content_title', 'Categories')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit Category</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put', 'class'=> 'form-horizontal', 'files' => true]) !!}
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_general" data-toggle="tab" aria-expanded="true">General</a></li>
                    <li class=""><a href="#tab_data" data-toggle="tab" aria-expanded="false">Data</a></li>
                    <li class=""><a href="#tab_design" data-toggle="tab" aria-expanded="false">Design</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="tab_general">
                        @include('dashboard.category.edit.general')
                    </div>

                    <div class="tab-pane" id="tab_data">
                        @include('dashboard.category.edit.data')
                    </div>

                    <div class="tab-pane" id="tab_design">
                        @include('dashboard.category.edit.design')
                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::submit('Save', ['class' => 'btn btn-info pull-right']) }}
        </div>

        <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
@endsection
