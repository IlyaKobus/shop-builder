<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">

        @foreach(ViewDataHelper::getLanguages('name', 'code') as $code => $name)
            <li class=" @if($loop->first) active @endif"><a
                        href="#tab_{{$code}}" data-toggle="tab"
                        aria-expanded="true"><span
                            class="flag-icon flag-icon-{{$code}}"></span> {{ $name }}
                </a></li>
        @endforeach

    </ul>
    <div class="tab-content">

        @foreach(ViewDataHelper::getLanguages() as $language)
            <div class="tab-pane @if($loop->first) active @endif"
                 id="tab_{{$language->code}}">
                <div class="form-group required @if($errors->has("locales[{$language->code}][title]")) has-error @endif">

                    {{ Form::label("locales[{$language->code}][title]", 'Post Title', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("locales[{$language->code}][title]", null, ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}

                        @if($errors->has("locales[{$language->code}][title]"))
                            <span class="help-block">{{ $errors->first("locales[{$language->code}][title]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has("locales[{$language->code}][description]")) has-error @endif">

                    {{ Form::label("locales[{$language->code}][description]", 'Description', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::textarea("locales[{$language->code}][description]", null) }}

                        @if($errors->has("locales[{$language->code}][description]"))
                            <span class="help-block">{{ $errors->first("locales[{$language->code}][description]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has('meta_tag_title')) has-error @endif">

                    {{ Form::label('slug', 'Slug', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("locales[{$language->code}][slug]", null, ['class' => 'form-control', 'placeholder' => 'Slug', 'readonly']) }}

                        @if($errors->has('meta_tag_title'))
                            <span class="help-block">{{ $errors->first('meta_tag_title') }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group required @if($errors->has("locales[{$language->code}][meta_tag_title]")) has-error @endif">

                    {{ Form::label("locales[{$language->code}][meta_tag_title]", 'Meta Tag Title', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("locales[{$language->code}][meta_tag_title]", null, ['class' => 'form-control', 'placeholder' => 'Meta Tag Title', 'required']) }}

                        @if($errors->has("locales[{$language->code}][meta_tag_title]"))
                            <span class="help-block">{{ $errors->first("locales[{$language->code}][meta_tag_title]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has("locales[{$language->code}][meta_tag_description]")) has-error @endif">

                    {{ Form::label("locales[{$language->code}][meta_tag_description]", 'Meta Tag Description', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("locales[{$language->code}][meta_tag_description]", null, ['class' => 'form-control', 'placeholder' => 'Meta Tag Description']) }}

                        @if($errors->has("locales[{$language->code}][meta_tag_description]"))
                            <span class="help-block">{{ $errors->first("locales[{$language->code}][meta_tag_description]") }}</span>
                        @endif

                    </div>
                </div>

                <hr/>

                <div class="form-group @if($errors->has("locales[{$language->code}][meta_tag_keywords]")) has-error @endif">

                    {{ Form::label("locales[{$language->code}][meta_tag_keywords]", 'Meta Tag Keywords', ['class' => 'col-md-2 control-label']) }}

                    <div class="col-md-10">
                        {{ Form::text("locales[{$language->code}][meta_tag_keywords]", null, ['class' => 'form-control', 'placeholder' => 'Meta Tag Keywords']) }}

                        @if($errors->has("locales[{$language->code}][meta_tag_keywords]"))
                            <span class="help-block">{{ $errors->first("locales[{$language->code}][meta_tag_keywords]") }}</span>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>
