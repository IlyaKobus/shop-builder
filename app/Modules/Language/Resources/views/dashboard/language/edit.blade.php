@extends('layouts.dashboard')

@section('content_title', 'Languages')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit Language</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($language, ['route' => ['languages.update', $language->code], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Language Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group required @if($errors->has('code')) has-error @endif">

                {{ Form::label('code', 'Code', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Code', 'required',  'minlength' => 2, 'maxlength' => 2]) }}

                    @if($errors->has('code'))
                        <span class="help-block">{{ $errors->first('code') }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group @if($errors->has('sort_order')) has-error @endif">

                {{ Form::label('sort_order', 'Sort Order', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::number("sort_order", null, ['class' => 'form-control', 'placeholder' => 'Sort Order']) }}

                    @if($errors->has('sort_order'))
                        <span class="help-block">{{ $errors->first('sort_order') }}</span>
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

@section('js')
    <script>
        $(function () {
            $('select[name=parent_id]').selectTree({
                dataUrl: '/dashboard/category/tree',
            });
        });
    </script>
@endsection
