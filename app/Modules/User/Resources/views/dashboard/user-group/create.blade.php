@extends('layouts.dashboard')

@section('content_title', 'User Groups')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create User Group</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route' => 'user-groups.store', 'method' => 'post', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'User Group Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>

            <fieldset>
                <legend>Permissions</legend>
                <div class="col-md-12">
                    <div class="tab-attributes">
                        <table class="table permissions-table">
                            <tbody>
                            <tr>
                                <th>Model</th>

                                @foreach(ViewDataHelper::getModelPermissionActions() as $action)
                                    <th>{{ ucfirst($action) }}</th>
                                @endforeach

                                <th style="width: 40px"></th>
                            </tr>

                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-permission" title="Edit">ADD</button>
                    </div>
                </div>
            </fieldset>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::submit('Create', ['class' => 'btn btn-info pull-right']) }}
        </div>

        <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
@endsection
