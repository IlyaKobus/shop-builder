<tr class="attribute-table__row">
    <td>
        {{ Form::select("attributes[$index][id]", ViewDataHelper::getAttributesSelect(), null, ['class' => 'form-control', 'placeholder' => 'Attribute', 'required']) }}
    </td>

    <td>
        @foreach(ViewDataHelper::getLanguages('code') as $code)
            <div class="input-group">
                <span class="input-group-addon"><span class=" flag-icon flag-icon-{{$code}}"></span></span>
                {{ Form::text("attributes[$index][locales][{$code}][value]", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
            </div>
        @endforeach
    </td>
    <td>
        <button class="btn btn-danger btn-remove-attribute pull-right"
                title="Delete attribute"><span
                    class="glyphicon glyphicon-remove"></span>
        </button>
    </td>
</tr>