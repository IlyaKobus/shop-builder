@extends('layouts.dashboard')

@section('content_title', 'Manufacturers')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create Manufacturer</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route' => 'manufacturers.store', 'method' => 'post', 'class'=> 'form-horizontal', 'files' => true]) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Manufacturer Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text("name", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>

            <hr/>

            <div class="form-group @if($errors->has('image')) has-error @endif">

                {{ Form::label('image', 'Image', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    <div class="image-block">
                        <img class="image-block__img image-block__img--clear"
                             src="{{ config('dashboard.default_image_url') }}" alt=""/>
                        <button class="btn btn-primary image-block__btn-edit d-none"><span
                                    class="fa fa-edit"></span></button>
                        <button class="btn btn-danger image-block__btn-remove d-none"><span
                                    class="fa fa-minus-square"></span></button>
                        {{ Form::file('image', ['accept' => 'image/*']) }}
                    </div>

                    @if($errors->has('image'))
                        <span class="help-block">{{ $errors->first('image') }}</span>
                    @endif

                </div>
            </div>

            <hr/>

            <div class="form-group @if($errors->has('sort_order')) has-error @endif">

                {{ Form::label('sort_order', 'Sort Order', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::number("sort_order", 0, ['class' => 'form-control', 'placeholder' => 'Sort Order']) }}

                    @if($errors->has('sort_order'))
                        <span class="help-block">{{ $errors->first('sort_order') }}</span>
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
