<div class="tab-links">
    <div class="form-group @if($errors->has('manufacturer_id')) has-error @endif">

        {{ Form::label('manufacturer_id', 'Manufacturer', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('manufacturer_id', ViewDataHelper::getManufacturersSelect(), $product->manufacturer_id, ['class' => 'form-control']) }}

            @if($errors->has('manufacturer_id'))
                <span class="help-block">{{ $errors->first('manufacturer_id') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has('description')) has-error @endif">

        {{ Form::label('categories', 'Categories', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('categories[]', ViewDataHelper::getCategoriesSelect(), $product->categories->pluck('id'), ['class' => 'form-control', 'multiple']) }}

            @if($errors->has('description'))
                <span class="help-block">{{ $errors->first('description') }}</span>
            @endif

        </div>
    </div>

    <hr/>

    <div class="form-group @if($errors->has('primary_category')) has-error @endif">

        {{ Form::label('primary_category', 'Primary category', ['class' => 'col-md-2 control-label']) }}

        <div class="col-md-10">
            {{ Form::select('primary_category', [], $product->primary_category, ['class' => 'form-control']) }}

            @if($errors->has('primary_category'))
                <span class="help-block">{{ $errors->first('primary_category') }}</span>
            @endif

        </div>
    </div>
</div>