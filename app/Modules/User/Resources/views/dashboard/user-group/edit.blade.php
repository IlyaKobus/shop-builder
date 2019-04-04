@extends('layouts.dashboard')

@section('content_title', 'User Groups')

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><span class="fa fa-edit"></span> Edit User Group</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!! Form::model($group, ['route' => ['user-groups.update', $group->id], 'method' => 'put', 'class'=> 'form-horizontal']) !!}
        <div class="box-body">

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label('name', 'User Group Name', ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>
            </div>

            <fieldset>
                <legend>Permissions</legend>
                <div class="col-md-12">
                    <div class="tab-attributes">
                        <table class="table permissions-table">
                            <tbody>
                            <tr>
                                <th>Model</th>

                                @foreach(ViewDataHelper::getModelPermissionActions() as $action)
                                    <th>{{ ucfirst($action) }}</th>
                                @endforeach

                                <th style="width: 40px"></th>
                            </tr>

                            @foreach($group->permissions as $permission)
                                <tr class="permissions-table__row">
                                    <td>
                                        {{ Form::select("permissions[{$loop->index}][name]", ViewDataHelper::getModelPermissions(), $permission->model, ['class' => 'form-control', 'required']) }}
                                    </td>

                                    @foreach(ViewDataHelper::getModelPermissionActions() as $action)
                                        <td>
                                            <label>
                                                <div class="icheckbox_square-blue" aria-checked="false"
                                                     aria-disabled="false">
                                                    {{ Form::checkbox("permissions[{$loop->parent->index}][actions][{$action}]", 1, (bool)$permission->getAttribute("is_{$action}_permitted"), ['hidden']) }}
                                                    <ins class="iCheck-helper"></ins>
                                                </div>
                                            </label>
                                        </td>
                                    @endforeach

                                    <td>
                                        <button class="btn btn-danger btn-remove-permission pull-right"
                                                title="Delete attribute"><span
                                                    class="glyphicon glyphicon-remove"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <button class="btn btn-block btn-primary btn-add-permission" title="Edit">ADD</button>
                    </div>
                </div>
            </fieldset>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            {{ Form::submit('Save', ['class' => 'btn btn-info pull-right']) }}
        </div>

        <!-- /.box-footer -->
        {!! Form::close() !!}

    </div>
@endsection
