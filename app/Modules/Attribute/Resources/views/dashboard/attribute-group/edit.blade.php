@extends('layouts.dashboard')

@section('content_title', 'Attribute Groups')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit Attribute Group</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($attributeGroup, ['route' => ['attribute-groups.update', $attributeGroup->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                {{ Form::label("name", 'Attribute Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">

                    @foreach(ViewDataHelper::getLanguages() as $language)
                        <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                            {{ Form::text("locales[{$language->code}][name]", $attributeGroup->getLocaled('name', $language->code), ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="form-group @if($errors->has('name')) has-error @endif">

                {{ Form::label('sort_order', 'Sort Order', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::number("sort_order", null, ['class' => 'form-control', 'placeholder' => 'Sort Order', 'min' => '0']) }}

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

@section('js')
    <script>
        $(function () {
            $('select[name=parent_id]').selectTree({
                dataUrl: '/dashboard/category/tree',
            });
        });
    </script>
@endsection
