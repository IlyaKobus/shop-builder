<tr class="permissions-table__row">
    <td>
        {{ Form::select("permissions[{$index}][name]", ViewDataHelper::getModelPermissions(), null, ['class' => 'form-control', 'required']) }}
    </td>

    @foreach(\App\Modules\User\Enums\ModelActionEnum::toArray() as $action)
        <td>
            <label>
                <div class="icheckbox_square-blue" aria-checked="false"
                     aria-disabled="false">
                    {{ Form::checkbox("permissions[{$index}][actions][{$action}]", 1, true, ['hidden']) }}
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
