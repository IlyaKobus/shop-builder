@extends('layouts.dashboard')

@section('content_title', 'Pages')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit Page</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($page, ['route' => ['pages.update', $page->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                {{ Form::label("name", 'Page Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">

                    @foreach(ViewDataHelper::getLanguages() as $language)
                        <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                            {{ Form::text("locales[{$language->code}][name]", $page->getLocaled('name', $language->code), ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}
                        </div>
                    @endforeach

                </div>
            </div>

            <hr/>

            <div class="form-group v-center @if($errors->has('name')) has-error @endif">

                {{ Form::label('slug', 'Slug', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">

                    @foreach(ViewDataHelper::getLanguages() as $language)
                        <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                            {{ Form::text("locales[{$language->code}][slug]", $page->getLocaled('slug', $language->code), ['class' => 'form-control', 'placeholder' => 'Slug', 'readonly']) }}
                        </div>
                    @endforeach

                </div>
            </div>

            <hr/>

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('view', 'View', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text("view", null, ['class' => 'form-control', 'placeholder' => 'View']) }}
                </div>
            </div>

            <hr/>

            <div class="form-group @if($errors->has('model')) has-error @endif">

                {{ Form::label('layout_id', 'Layout', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::select('layout_id', ViewDataHelper::getLayoutsSelect(), null, ['class' => 'form-control', 'placeholder' => '']) }}

                    @if($errors->has('model'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif

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

@section('js')
    <script>
        $(function () {
            $('select[name=parent_id]').selectTree({
                dataUrl: '/dashboard/category/tree',
            });
        });
    </script>
@endsection
