<tr class="module-table__row">
    <td>
        {{ Form::select("modules[{$type}][{$index}][id]", \App\Helpers\ViewDataHelper::getModulesSelect(), null, ['class' => 'form-control', 'placeholder' => 'Module' ,'required']) }}
    </td>
    <td>
        <a href="#" target="_blank" class="btn btn-primary d-none module-edit"><span
                    class="glyphicon glyphicon-edit"></span>
        </a>
        <button class="btn btn-danger btn-remove-module pull-right"
                title="Delete attribute"><span
                    class="glyphicon glyphicon-remove"></span>
        </button>
    </td>
</tr>
