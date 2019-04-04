<div class="row">
    <div class="col-md-2">
        <ol class="selectable options-list ui-selectable">

            @foreach($product->options as $option)
                <li class="ui-widget-content ui-selectee @if($loop->first) ui-selected @endif"
                    rel="option-block-{{$option->id}}">{{ $option->origin->name }}
                    <span class="fa fa-minus-square pull-right text-red"></span>
                </li>
            @endforeach

        </ol>

        {{ Form::select('options-list', ViewDataHelper::getOptionsSelect(), null, ['placeholder' => 'Option']) }}

    </div>

    <div class="col-md-10 option-block__wrapper">

        @foreach($product->options as $option)
            <div class="option-block" id="option-block-{{$option->id}}"
                 @if($loop->first) style="display: block;" @endif>
                <table class="table product-option-table">
                    <thead>
                    <tr>
                        <th class="required">Option Value</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Weight</th>
                        <th style="width: 40px"></th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($option->values as $value)
                        <tr class="product-option-table__row">
                            <td>
                                {{ Form::select("options[{$option->id}][values][{$loop->index}][id]", $option->values->pluck('name', 'id'), $value->origin->id) }}
                            </td>
                            <td>
                                {{ Form::text("options[{$option->id}][values][{$loop->index}][quantity]", $value->quantity, ['class' => 'form-control']) }}
                            </td>
                            <td>
                                {{ Form::text("options[{$option->id}][values][{$loop->index}][price]", $value->price, ['class' => 'form-control']) }}
                            </td>
                            <td>
                                {{ Form::text("options[{$option->id}][values][{$index}][discount_price]", $value->discount_price, ['class' => 'form-control']) }}
                            </td>
                            <td>
                                {{ Form::text("options[{$option->id}][values][{$loop->index}][weight]", $value->weight, ['class' => 'form-control']) }}
                            </td>
                            <td>
                                <button class="btn btn-danger btn-remove-product-option-value"><span
                                            class="fa fa-minus-square"></span></button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <button class="btn btn-block btn-primary btn-add-option-value" title="Edit">ADD
                </button>
            </div>
        @endforeach

    </div>
</div>