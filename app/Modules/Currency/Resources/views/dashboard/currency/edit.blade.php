@extends('layouts.dashboard')

@section('content_title', 'Currencies')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Create Currency</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($currency, ['route' => ['currencies.update', $currency->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                {{ Form::label("name", 'Currency Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">

                    @foreach(ViewDataHelper::getLanguages() as $language)
                        <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                            {{ Form::text("locales[{$language->code}][name]", $currency->getLocaled('name', $language->code), ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
                        </div>
                    @endforeach

                    @if($errors->has("locales[{$language->code}][name]"))
                        <span class="help-block">{{ $errors->first("locales[{$language->code}][name]") }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label("code", 'Code', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Code']) }}
                </div>

                @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group required @if($errors->has('value')) has-error @endif">

                {{ Form::label('value', 'Value', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('value', null, ['class' => 'form-control', 'placeholder' => 'Sort Order', $currency->is_default ? 'disabled': '']) }}

                    @if($errors->has('value'))
                        <span class="help-block">{{ $errors->first('value') }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group @if($errors->has('is_default')) has-error @endif">

                {{ Form::label('is_default', 'Default', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">

                    <label>
                        <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                            {{ Form::checkbox('is_default', 1, null, ['hidden']) }}
                            <ins class="iCheck-helper"></ins>
                        </div>
                    </label>

                    @if($errors->has('is_default'))
                        <span class="help-block">{{ $errors->first('is_default') }}</span>
                    @endif

                </div>
            </div>

            <div class="form-group @if($errors->has('prefix')) has-error @endif">

                {{ Form::label('prefix', 'Prefix', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('prefix', null, ['class' => 'form-control', 'placeholder' => 'Prefix']) }}
                </div>

                @if($errors->has('prefix'))
                    <span class="help-block">{{ $errors->first('prefix') }}</span>
                @endif

            </div>

            <div class="form-group @if($errors->has('postfix')) has-error @endif">

                {{ Form::label('postfix', 'Postfix', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('postfix', null, ['class' => 'form-control', 'placeholder' => 'Postfix']) }}
                </div>

                @if($errors->has('postfix'))
                    <span class="help-block">{{ $errors->first('postfix') }}</span>
                @endif

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
            $('input[name=is_default]')
                .on('ifChecked', function () {
                    $('input[name=value]').attr('disabled', 'disabled');
                })
                .on('ifUnchecked', function () {
                    $('input[name=value]').removeAttr('disabled');
                });
        });
    </script>
@endsection
