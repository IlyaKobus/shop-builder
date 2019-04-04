@extends('layouts.dashboard')

@section('content_title', 'Users')

@section('content')
    <!-- Default box -->
    <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-list"></span> User List</h3>
            <div class="box-header__new-btn pull-right">

                {!! Form::open(['route' => 'users.create', 'class' => 'form-vertical', 'method' => 'get']) !!}
                <div class="form-group">
                    <button class="btn btn-success"><span class="fa fa-plus"></span></button>
                </div>
                {{ Form::close() }}

            </div>
        </div>

        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

@section('js')
    {!! $dataTable->scripts() !!}
@endsection
