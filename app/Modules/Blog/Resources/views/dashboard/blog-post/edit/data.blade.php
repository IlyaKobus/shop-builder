<div class="tad-data">
    <div class="form-group @if($errors->has('blog-categories')) has-error @endif">

        {{ Form::label('blog-categories', 'Categories', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('blog-categories[]', \App\Helpers\ViewDataHelper::getBlogCategoriesSelect(), $post->categories->pluck('id'), ['class' => 'form-control', 'multiple']) }}

            @if($errors->has('blog-categories'))
                <span class="help-block">{{ $errors->first('blog-categories') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has('image')) has-error @endif">

        {{ Form::label('image', 'Image', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            <div class="image-block">
                <img class="image-block__img image-block__img--clear"
                     src="{{ $post->image }}" alt=""/>
                <button class="btn btn-primary image-block__btn-edit d-none"><span
                            class="fa fa-edit"></span></button>
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
