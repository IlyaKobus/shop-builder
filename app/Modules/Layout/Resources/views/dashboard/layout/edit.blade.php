@extends('layouts.dashboard')

@section('content_title', 'Layouts')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-pencil"></span> Edit Layout</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($layout, ['route' => ['layouts.update', $layout->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'Layout Name', ['class' => 'col-md-2 control-label', 'required']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>

                @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif

            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="layout-table-container">
                        <table class="table modules-table layout-left-table">
                            <tbody>
                            <tr>
                                <th>Column Left</th>
                                <th style="width: 40px"></th>
                            </tr>

                            @foreach($layout->columnLeft as $module)
                                <tr class="module-table__row">
                                    <td>
                                        {{ Form::select("modules[left][{$loop->index}][id]", \App\Helpers\ViewDataHelper::getModulesSelect(), $module->id, ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        {!! Form::close() !!}
                                        <button class="btn btn-danger btn-remove-module pull-right"
                                                title="Delete attribute"><span
                                                    class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="left" title="Add">ADD
                        </button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="layout-table-container">
                        <table class="table modules-table layout-top-table">
                            <tbody>
                            <tr>
                                <th>Content Top</th>
                                <th style="width: 40px"></th>
                            </tr>

                            @foreach($layout->contentTop as $module)
                                <tr class="module-table__row">
                                    <td>
                                        {{ Form::select("modules[top][{$loop->index}][id]", \App\Helpers\ViewDataHelper::getModulesSelect(), $module->id, ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <button class="btn btn-danger btn-remove-module pull-right"
                                                title="Delete attribute"><span
                                                    class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="top" title="Add">ADD
                        </button>

                    </div>

                    <div class="layout-table-container">
                        <table class="table modules-table layout-bottom-table">
                            <tbody>
                            <tr>
                                <th>Content Bottom</th>
                                <th style="width: 40px"></th>
                            </tr>

                            @foreach($layout->contentBottom as $module)
                                <tr class="module-table__row">
                                    <td>
                                        {{ Form::select("modules[bottom][{$loop->index}][id]", \App\Helpers\ViewDataHelper::getModulesSelect(), $module->id, ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <button class="btn btn-danger btn-remove-module pull-right"
                                                title="Delete attribute"><span
                                                    class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="bottom" title="Add">ADD
                        </button>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="layout-table-container">
                        <table class="table modules-table layout-right-table">
                            <tbody>
                            <tr>
                                <th>Column Right</th>
                                <th style="width: 40px"></th>
                            </tr>

                            @foreach($layout->columnRight as $module)
                                <tr class="module-table__row">
                                    <td>
                                        {{ Form::select("modules[right][{$loopIndex}][id]", \App\Helpers\ViewDataHelper::getModulesSelect(), $module->id, ['class' => 'form-control', 'required']) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-primary"><span
                                                    class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <button class="btn btn-danger btn-remove-module pull-right"
                                                title="Delete attribute"><span
                                                    class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-module" data-type="right" title="Add">ADD
                        </button>
                    </div>
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
