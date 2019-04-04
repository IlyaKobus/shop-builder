<div class="tab-images">

    <table class="table image-table">
        <tbody>
        <tr>
            <th>Image</th>
        </tr>

        <tr class="attribute-table__row">
            <td class="image-table__td image-block">
                <img class="image-block__img image-block__img--clear"
                     src="{{ $product->main_image }}" alt=""/>
                <button class="btn btn-primary image-block__btn-edit d-none"><span
                            class="fa fa-edit"></span></button>
                <button class="btn btn-danger image-block__btn-remove d-none"><span
                            class="fa fa-minus-square"></span></button>
                {{ Form::file('main_image', ['accept' => 'image/*']) }}
            </td>
        </tr>

        </tbody>
    </table>

    <table class="table image-table images-block">
        <tbody>
        <tr>
            <th>Additional Images</th>
            <th>Sort Order</th>
        </tr>

        @foreach($product->images as $image)
            <tr class="attribute-table__row">
                <td class="image-table__td image-block">
                    <img class="image-block__img image-block__img--clear"
                         src="{{ $image->url }}" alt=""/>
                    <button class="btn btn-primary image-block__btn-edit d-none"><span
                                class="fa fa-edit"></span></button>
                    <button class="btn btn-danger image-block__btn-remove d-none"><span
                                class="fa fa-minus-square"></span></button>
                    {{ Form::file("images[{$loop->index}][image]", ['accept' => 'image/*']) }}
                </td>
                <td>
                    {{ Form::text("images[{$loop->index}][sort_order]", $image->sort_order, ['class' => 'form-control']) }}
                </td>
                <td style="width: 40px;">
                    <button class="btn btn-danger btn-remove-image">
                        <span class="fa fa-minus-square"></span>
                    </button>
                    {{ Form::hidden("images[{$loop->index}][id]", $image->id, ['class' => 'form-control']) }}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <button class="btn btn-block btn-primary btn-add-image" title="Edit">ADD</button>
</div>