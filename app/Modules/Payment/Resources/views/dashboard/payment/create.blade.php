@extends('layouts.dashboard')

@section('content_title', 'Payments')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Create Payment</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::open(['route' => 'payments.store', 'method' => 'post', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group v-center required @if($errors->has('name')) has-error @endif">

                {{ Form::label("name", 'Payment Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    @foreach(ViewDataHelper::getLanguages() as $language)
                        <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                            {{ Form::text("locales[{$language->code}][name]", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
                        </div>
                    @endforeach
                </div>
            </div>

            <hr/>

            <div class="form-group v-center @if($errors->has('name')) has-error @endif">

                {{ Form::label("sort_order", 'Sort Order', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::number("sort_order", 0, ['class' => 'form-control', 'placeholder' => 'Sort Order']) }}
                </div>
            </div>

            <hr/>

            <div class="form-group @if($errors->has('name')) has-error @endif">

                {{ Form::label("status", 'Status', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::select('status', ViewDataHelper::getPaymentStatuses(), null, ['class' => 'form-control']) }}
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
