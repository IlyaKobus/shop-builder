@php $module = $module ?? null; @endphp

<div class="module-settings-block">
    <div class="form-group @if($errors->has('name')) has-error @endif">

        {{ Form::label("width", 'Width', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("options[width]", $module ? $module->getOption('width'): null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
        </div>
    </div>
    <div class="form-group @if($errors->has('name')) has-error @endif">

        {{ Form::label("height", 'Height', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::text("options[height]", $module ? $module->getOption('height'): null, ['class' => 'form-control', 'placeholder' => 'Value', 'required']) }}
        </div>
    </div>
</div>