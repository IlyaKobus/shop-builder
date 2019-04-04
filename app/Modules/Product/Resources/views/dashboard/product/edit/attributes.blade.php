<table class="table attribute-table">
    <tbody>
    <tr>
        <th>Attribute</th>
        <th>Value</th>
        <th style="width: 40px"></th>
    </tr>

    @foreach($product->attributes as $attribute)
        <tr class="attribute-table__row">
            <td>
                {{ Form::select("attributes[{$loop->index}][id]", ViewDataHelper::getAttributesSelect(), $attribute->origin->id, ['class' => 'form-control', 'placeholder' => 'Attribute', 'required']) }}
            </td>
            <td>
                @foreach(ViewDataHelper::getLanguages() as $language)
                    <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                        {{ Form::text("attributes[{$loop->parent->index}][locales][{$language->code}][value]", $attribute->getLocaled('value', $language->code), ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
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
    @endforeach

    </tbody>
</table>

<button class="btn btn-block btn-primary btn-add-attribute" title="Edit">ADD</button>