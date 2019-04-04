<tr class="option-table__row">
    <td>

        @foreach(ViewDataHelper::getLanguages() as $language)
            <div class="input-group">
                        <span class="input-group-addon"><span
                                    class=" flag-icon flag-icon-{{$language->code}}"></span></span>
                {{ Form::text("values[{$index}][locales][{$language->code}][name]", null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}

                @if($errors->has("values[{$index}][locales][{$language->code}][name]"))
                    <span class="help-block">{{ $errors->first("values[{$index}][locales][{$language->code}][name]") }}</span>
                @endif

            </div>
        @endforeach

    </td>
    <td>
        <div class="image-block">
            <img class="image-block__img image-block__img--clear"
                 src="{{ config('dashboard.default_image_url') }}" alt=""/>
            <button class="btn btn-primary image-block__btn-edit d-none"><span
                        class="fa fa-edit"></span></button>
            <button class="btn btn-danger image-block__btn-remove d-none"><span
                        class="fa fa-minus-square"></span></button>
            {{ Form::file("values[{$index}][image]", ['accept' => 'image/*']) }}

            @if($errors->has("values[{$index}][image]"))
                <span class="help-block">{{ $errors->first("values[{$index}][image]") }}</span>
            @endif

        </div>
    </td>
    <td>
        {{ Form::number("values[{$index}][sort_order]", 0, ['class' => 'form-control', 'placeholder' => 'Sort Order', 'min' => 0, 'required']) }}

        @if($errors->has("values[{$index}][sort_order]"))
            <span class="help-block">{{ $errors->first("values[{$index}][sort_order]") }}</span>
        @endif

    </td>
    <td>
        <button class="btn btn-danger btn-remove-option-value"><span class="fa fa-minus-square"></span></button>
    </td>
</tr>