<div class="tab-design">

    <div class="form-group @if($errors->has('model')) has-error @endif">

        {{ Form::label('layout_id', 'Layout', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('layout_id', ViewDataHelper::getLayoutsSelect(), null, ['class' => 'form-control', 'placeholder' => '']) }}

            @if($errors->has('model'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>
</div>
