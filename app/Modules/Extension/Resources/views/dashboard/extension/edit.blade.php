@extends('layouts.dashboard')

@section('content_title', 'Extensions')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit Extension</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($extension, ['route' => ['extensions.update', $extension->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group @if($errors->has('status')) has-error @endif">

                {{ Form::label('status', 'Status', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::select('status', ViewDataHelper::getExtensionStatuses(), null, ['class' => 'form-control']) }}

                    @if($errors->has('status'))
                        <span class="help-block">{{ $errors->first('status') }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Extension Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

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
