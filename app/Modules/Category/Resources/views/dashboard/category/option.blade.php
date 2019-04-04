<div class="tab-pane__option-block">
    <div class="form-group">
        <div class="col-md-3">
            {{ Form::text("option[$index][name]", null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
        </div>
        <div class="col-md-2 tab-pane__option-block__value">
            {{ Form::text("option[$index][value][0]", null, ['class' => 'form-control', 'placeholder' => 'Value']) }}
        </div>
        <div class="col-md-1 pull-right">
            <button class="btn btn-danger btn-remove-option pull-right" title="Delete option"><span
                        class="glyphicon glyphicon-remove"></span>
            </button>
            <button data-option-id="{{ $index }}"
                    class="btn btn-success btn-add-option-value pull-left"
                    title="Add value"><span
                        class="glyphicon glyphicon-plus"></span>
            </button>
        </div>
    </div>
</div>