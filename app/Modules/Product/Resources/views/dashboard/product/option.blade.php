<div class="option-block" id="option-block-{{ $option->id }}" data-option-id="{{ $option->id }}">
    <table class="table product-option-table">
        <thead>
        <tr>
            <th>Option Value</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount Price</th>
            <th>Weight</th>
            <th style="width: 40px"></th>
        </tr>
        </thead>

        <tbody>

        <tr class="product-option-table__row">
            <td>
                {{ Form::select("options[{$option->id}][values][0][id]", $option->values->pluck('name', 'id'), null) }}
            </td>
            <td>
                {{ Form::text("options[{$option->id}][values][0][quantity]", null, ['class' => 'form-control']) }}
            </td>
            <td>
                {{ Form::text("options[{$option->id}][values][0][price]", null, ['class' => 'form-control']) }}
            </td>
            <td>
                {{ Form::text("options[{$option->id}][values][0][discount_price]", null, ['class' => 'form-control']) }}
            </td>
            <td>
                {{ Form::text("options[{$option->id}][values][0][weight]", null, ['class' => 'form-control']) }}
            </td>
            <td>
                <button class="btn btn-danger btn-remove-product-option-value"><span
                            class="fa fa-minus-square"></span></button>
            </td>
        </tr>

        </tbody>
    </table>

    <button class="btn btn-block btn-primary btn-add-option-value" title="Edit">ADD
    </button>
</div>