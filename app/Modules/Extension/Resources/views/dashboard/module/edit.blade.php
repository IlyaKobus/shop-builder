@extends('layouts.dashboard')

@section('content_title', 'Modules')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Create Module</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($module, ['route' => ['modules.update', $module->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Module Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label("extension_id", 'Extension', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::select('extension_id', \App\Helpers\ViewDataHelper::getExtensionsSelect(), null, ['class' => 'form-control']) }}

                    @if($errors->has('extension_id'))
                        <span class="help-block">{{ $errors->first('extension_id') }}</span>
                    @endif

                </div>
            </div>

            <div class="module-options">
                @include("dashboard.extension.instances.{$module->extension->name}.options")
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

@section('js')
    <script>
        $(function () {
            $('select[name=extension_id]').on('change', function () {
                $.get(`/dashboard/extension/settings/${$(this).val()}`, function (res) {
                    $('.module-options').html(res);
                    init();
                });
            });
        });
    </script>
@endsection
