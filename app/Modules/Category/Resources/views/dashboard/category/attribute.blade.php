<div class="form-group">
    <div class="col-md-5">
        {{ Form::select("attribute[$index][type]", ['digit', 'string'], null, ['class' => 'form-control', 'placeholder' => 'Type', 'required']) }}
    </div>
    <div class="col-md-5">
        {{ Form::text("attribute[$index][name]", null, ['class' => 'form-control', 'placeholder' => 'Name', 'required']) }}
    </div>
    <div class="col-md-2 pull-right">
        <button class="btn btn-danger btn-remove-attribute pull-right"
                title="Delete attribute"><span
                    class="glyphicon glyphicon-remove"></span>
        </button>
    </div>
</div>