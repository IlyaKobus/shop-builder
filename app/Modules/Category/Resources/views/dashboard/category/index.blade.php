@extends('layouts.dashboard')

@section('content_title', 'Categories')

@section('content')
    <!-- Default box -->

    <div class="box">
        <div class="box-body">
            <div class="box-body__new-btn pull-right">

                {!! Form::open(['route' => 'categories.create', 'class' => 'form-vertical', 'method' => 'get']) !!}
                <div class="form-group">
                    <button class="btn btn-success"><span class="fa fa-plus"></span></button>
                </div>
                {{ Form::close() }}

            </div>
            <div class="clearfix grid-width-100"></div>

            @php $accordionIndex = 0; @endphp

            <div class="panel-group" id="accordion{{ $accordionIndex }}">

                @foreach($categories as $category)
                    @include('dashboard.category.group')
                @endforeach

            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
