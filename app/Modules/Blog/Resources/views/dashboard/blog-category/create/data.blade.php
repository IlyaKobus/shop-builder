<div class="tad-data">

    <div class="form-group @if($errors->has('image')) has-error @endif">

        {{ Form::label('image', 'Image', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            <div class="image-block">
                <img class="image-block__img image-block__img--clear"
                     src="{{ config('dashboard.default_image_url') }}" alt=""/>
                <button class="btn btn-danger image-block__btn-remove d-none"><span
                            class="fa fa-minus-square"></span></button>
                {{ Form::file('image', ['accept' => 'image/*']) }}
            </div>

            @if($errors->has('image'))
                <span class="help-block">{{ $errors->first('image') }}</span>
            @endif

        </div>
    </div>

</div>
