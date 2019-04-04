<div class="tad-data">
    <div class="form-group @if($errors->has('parent_id')) has-error @endif">

        {{ Form::label('parent_id', 'Parent', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('parent_id', ViewDataHelper::getCategoriesSelect(), $parentId ?? null, ['class' => 'form-control']) }}

            @if($errors->has('parent_id'))
                <span class="help-block">{{ $errors->first('parent_id') }}</span>
            @endif

        </div>
    </div>

    <div class="form-group @if($errors->has('is_root')) has-error @endif">
        <div class="col-md-offset-2 col-md-10">
            <label>
                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                    {{ Form::checkbox('is_root', 1, false, ['hidden']) }}
                    <ins class="iCheck-helper"></ins>
                </div>
            </label>
            Root

            @if($errors->has('is_root'))
                <span class="help-block">{{ $errors->first('is_root') }}</span>
            @endif
        </div>
    </div>

    <div class="form-group @if($errors->has('image')) has-error @endif">

        {{ Form::label('image', 'Image', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            <div class="image-block">
                <img class="image-block__img image-block__img--clear"
                     src="{{ config('dashboard.default_image_url') }}" alt=""/>
                <button class="btn btn-danger image-block__btn-remove d-none"><span
                            class="fa fa-minus-square"></span></button>
                {{ Form::file("image", ['accept' => 'image/*']) }}
            </div>

            @if($errors->has('image'))
                <span class="help-block">{{ $errors->first('image') }}</span>
            @endif

        </div>
    </div>

    <div class="form-group @if($errors->has('sort_order')) has-error @endif">

        {{ Form::label('sort_order', 'Sort Order', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::number("sort_order", null, ['class' => 'form-control', 'placeholder' => 'Sort Order']) }}

            @if($errors->has('sort_order'))
                <span class="help-block">{{ $errors->first('sort_order') }}</span>
            @endif

        </div>
    </div>

    <div class="form-group @if($errors->has('status')) has-error @endif">

        {{ Form::label('status', 'Status', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('status', ViewDataHelper::getCategoryStatuses(), null, ['class' => 'form-control',]) }}

            @if($errors->has('status'))
                <span class="help-block">{{ $errors->first('status') }}</span>
            @endif

        </div>
    </div>
</div>
