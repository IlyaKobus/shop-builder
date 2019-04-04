<div class="tad-data">
    <div class="form-group @if($errors->has('image')) has-error @endif">

        {{ Form::label('status', 'Status', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('status', ViewDataHelper::getInformationStatuses(), null, ['class' => 'form-control']) }}

            @if($errors->has('image'))
                <span class="help-block">{{ $errors->first('image') }}</span>
            @endif

        </div>
    </div>

    <div class="form-group @if($errors->has('name')) has-error @endif">

        {{ Form::label('sort_order', 'Sort Order', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::number("sort_order", 0, ['class' => 'form-control', 'placeholder' => 'Sort Order']) }}

            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif

        </div>
    </div>
</div>
