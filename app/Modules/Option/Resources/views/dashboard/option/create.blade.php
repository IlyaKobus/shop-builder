@extends('layouts.dashboard')

@section('content_title', 'Options')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create Option</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        <div class="box-header">
            <h2 class="box-title">Option</h2>
        </div>

        {!! Form::open(['route' => 'options.store', 'method' => 'post', 'class'=> 'form-horizontal', 'files' => true]) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Option Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">

                    @foreach(ViewDataHelper::getLanguages() as $language)
                        <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                            {{ Form::text("locales[{$language->code}][name]", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
                        </div>

                        @if($errors->has("locales[{$language->code}][name]"))
                            <span class="help-block">{{ $errors->first("locales[{$language->code}][name]") }}</span>
                        @endif

                    @endforeach

                </div>
            </div>

            <hr/>

            <div class="form-group @if($errors->has('name')) has-error @endif">

                {{ Form::label('sort_order', 'Sort Order', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::number("sort_order", 0, ['class' => 'form-control', 'placeholder' => 'Sort Order']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>

            <div class="box-header">
                <h2 class="box-title">Option Values</h2>
            </div>


            <div class="col-md-12">
                <table class="table option-value-table">
                    <thead>
                    <tr>
                        <th class="required">Option Value Name</th>
                        <th>Image</th>
                        <th>Sort Order</th>
                        <th style="width: 40px"></th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr class="option-table__row">
                        <td>

                            @foreach(ViewDataHelper::getLanguages() as $language)
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class=" flag-icon flag-icon-{{$language->code}}"></span>
                                    </span>
                                    {{ Form::text("values[0][locales][{$language->code}][name]", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
                                </div>
                            @endforeach

                        </td>
                        <td>
                            <div class="image-block">
                                <img class="image-block__img image-block__img--clear"
                                     src="{{ config('dashboard.default_image_url') }}" alt=""/>
                                <button class="btn btn-primary image-block__btn-edit d-none"><span
                                            class="fa fa-edit"></span></button>
                                <button class="btn btn-danger image-block__btn-remove d-none"><span
                                            class="fa fa-minus-square"></span></button>
                                {{ Form::file('values[0][image]', ['accept' => 'image/*']) }}
                            </div>
                        </td>
                        <td>
                            {{ Form::number("values[0][sort_order]", 0, ['class' => 'form-control', 'placeholder' => 'Sort Order', 'min' => 0, 'required']) }}
                        </td>
                        <td>
                            <button class="btn btn-danger btn-remove-option-value"><span
                                        class="fa fa-minus-square"></span></button>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <button class="btn btn-block btn-primary btn-add-option-value" title="Edit">ADD</button>
            </div>

        </div>

        <!-- /.box-body -->
        <div class=" box-footer">
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
