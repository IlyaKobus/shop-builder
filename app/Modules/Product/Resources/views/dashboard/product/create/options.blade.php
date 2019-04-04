<div class="tab-options">
    <div class="row">
        <div class="col-md-2">
            <ol class="selectable options-list ui-selectable">
            </ol>

            {{ Form::select('options-list', ViewDataHelper::getOptionsSelect(), null, ['placeholder' => 'Option']) }}

        </div>

        <div class="col-md-10 option-block__wrapper">

        </div>
    </div>
</div>