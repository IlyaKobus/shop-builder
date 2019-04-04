<div class="product-data-block" id="product-data-block-{{$index}}" style="display: none;">

    <fieldset>
        <legend>General</legend>
        <div class="form-group required @if($errors->has('name')) has-error @endif">

            {{ Form::label("products[{$product->id}][{$index}][quantity]", 'Quantity', ['class' => 'col-md-2 control-label']) }}

            <div class="col-md-10">
                {{ Form::number("products[{$product->id}][{$index}][quantity]", null, ['class' => 'form-control', 'min' => '1']) }}

                @if($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                @endif

            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Options</legend>

        @foreach($product->options as $option)

            <div class="form-group required @if($errors->has('name')) has-error @endif">

                {{ Form::label("products[options]", $option->name, ['class' => 'col-md-2 control-label']) }}

                <div class="col-md-10">
                    {{ Form::select("products[{$product->id}][{$index}][options][{$loop->index}][value]", $option->values->pluck('name', 'name'), null, ['class' => 'form-control']) }}

                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif

                </div>

                {{ Form::hidden("products[{$product->id}][{$index}][options][{$loop->index}][name]", $option->name) }}
            </div>

            @if(!$loop->last)
                <hr/>
            @endif
        @endforeach

    </fieldset>

</div>
