@extends('layouts.dashboard')

@section('content_title', 'Information')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> New Information</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route' => 'information.store', 'method' => 'post', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_general" data-toggle="tab" aria-expanded="true">General</a></li>
                    <li class=""><a href="#tab_data" data-toggle="tab" aria-expanded="false">Data</a></li>
                    <li class=""><a href="#tab_design" data-toggle="tab" aria-expanded="false">Design</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="tab_general">
                        @include('dashboard.information.create.general')
                    </div>

                    <div class="tab-pane" id="tab_data">
                        @include('dashboard.information.create.data')
                    </div>

                    <div class="tab-pane" id="tab_design">
                        @include('dashboard.information.create.design')
                    </div>
                    <!-- /.tab-content -->
                </div>
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
