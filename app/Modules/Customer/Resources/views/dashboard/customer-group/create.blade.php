@extends('layouts.dashboard')

@section('content_title', 'Customer Groups')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create Customer Group</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route' => 'customer-groups.store', 'method' => 'post', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has("name")) has-error @endif">

                {{ Form::label("name", 'Customer Group Name', ['class' => 'col-md-2 control-label']) }}

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

            <div class="form-group @if($errors->has('is_should_approve')) has-error @endif">

                {{ Form::label('is_should_approve', 'Approve New Customers', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    <label>
                        <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                            {{ Form::checkbox('is_should_approve', 1, false, ['hidden']) }}
                            <ins class="iCheck-helper"></ins>
                        </div>
                    </label>

                    @if($errors->has('is_should_approve'))
                        <span class="help-block">{{ $errors->first('is_should_approve') }}</span>
                    @endif
                </div>
            </div>

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
