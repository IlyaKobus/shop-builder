@php $module = $module ?? null; @endphp

<div class="module-settings-block">

    <div class="form-group @if($errors->has('manufacturer')) has-error @endif">

        {{ Form::label("manufacturers", 'Manufacturers', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select("options[manufacturers][]", ViewDataHelper::getManufacturersSelect(), $module ? array_map(function($i) {return (int) $i;}, explode(',', $module->getOption('manufacturers'))) : null, ['class' => 'form-control', 'multiple']) }}
        </div>
    </div>

</div>