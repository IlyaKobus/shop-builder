@extends('layouts.dashboard')

@section('content_title', 'Attributes')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit Attribute</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($attribute, ['route' => ['attributes.update', $attribute->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Attribute Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">

                    @foreach(ViewDataHelper::getLanguages() as $language)
                        <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                            {{ Form::text("locales[{$language->code}][name]", $attribute->getLocaled('name', $language->code), ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}
                        </div>

                        @if($errors->has("locales[{$language->code}][name]"))
                            <span class="help-block">{{ $errors->first("locales[{$language->code}][name]") }}</span>
                        @endif
                    @endforeach

                </div>
            </div>

            <div class="form-group @if($errors->has('name')) has-error @endif">

                {{ Form::label("name", 'Attribute Group', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::select('attribute_group_id', \App\Helpers\ViewDataHelper::getAttributeGroupsSelect(), null, ['class' => 'form-control', 'placeholder' => 'No Group', 'required']) }}

                    @if($errors->has('attribute_group_id'))
                        <span class="help-block">{{ $errors->first('attribute_group_id') }}</span>
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
