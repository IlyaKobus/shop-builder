<tr class="attribute-table__row">
    <td class="image-table__td image-block">
        <img class="image-block__img image-block__img--clear"
             src="{{ config('dashboard.default_image_url') }}" alt=""/>
        <button class="btn btn-primary image-block__btn-edit d-none"><span
                    class="fa fa-edit"></span></button>
        <button class="btn btn-danger image-block__btn-remove d-none"><span
                    class="fa fa-minus-square"></span></button>
        {{ Form::file("images[{$index}][image]", ['accept' => 'image/*']) }}
    </td>
    <td>
        {{ Form::text("images[{$index}][sort_order]", null, ['class' => 'form-control']) }}
    </td>
    <td style="width: 40px;">
        <button class="btn btn-danger btn-remove-image">
            <span class="fa fa-minus-square"></span>
        </button>
    </td>
</tr>