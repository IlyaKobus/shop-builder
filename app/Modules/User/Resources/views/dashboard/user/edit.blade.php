@extends('layouts.dashboard')

@section('content_title', 'Users')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit User</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('username', 'Username', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) }}
                </div>
            </div>

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('user_group_id', 'User Group', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::select('user_group_id', ViewDataHelper::getUserGroupSelect(), null, ['class' => 'form-control']) }}
                </div>
            </div>

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('email', 'Email', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                </div>
            </div>

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('password', 'Password', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
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
