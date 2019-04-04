<tr class="product-option-table__row">
    <td>
        {{ Form::select("options[{$option->id}][values][{$index}][id]", $option->values->pluck('name', 'id'), null) }}
    </td>
    <td>
        {{ Form::text("options[{$option->id}][values][{$index}][quantity]", null, ['class' => 'form-control']) }}
    </td>
    <td>
        {{ Form::text("options[{$option->id}][values][{$index}][price]", null, ['class' => 'form-control']) }}
    </td>
    <td>
        {{ Form::text("options[{$option->id}][values][{$index}][discount_price]", null, ['class' => 'form-control']) }}
    </td>
    <td>
        {{ Form::text("options[{$option->id}][values][{$index}][weight]", null, ['class' => 'form-control']) }}
    </td>
    <td>
        <button class="btn btn-danger btn-remove-product-option-value"><span
                    class="fa fa-minus-square"></span></button>
    </td>
</tr>