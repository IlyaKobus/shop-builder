@extends('layouts.dashboard')

@section('content_title', 'Layouts')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create Layout</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route' => 'layouts.store', 'method' => 'post', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Layout Name', ['class' => 'col-md-2 control-label', 'required']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="layout-table-container">
                        <table class="table modules-table layout-left-table">
                            <tbody>
                            <tr>
                                <th>Column Left</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="left" title="Add">ADD
                        </button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="layout-table-container">
                        <table class="table modules-table layout-top-table">
                            <tbody>
                            <tr>
                                <th>Content Top</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </tbody>

                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="top" title="Add">ADD
                        </button>

                    </div>

                    <div class="layout-table-container">
                        <table class="table modules-table layout-bottom-table">
                            <tbody>
                            <tr>
                                <th>Content Bottom</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="bottom" title="Add">ADD
                        </button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="layout-table-container">
                        <table class="table modules-table layout-right-table">
                            <tbody>
                            <tr>
                                <th>Column Right</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="right" title="Add">ADD
                        </button>
                    </div>
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
