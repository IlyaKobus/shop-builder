<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row v-center">
            <div class="col-md-10">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion{{ $accordionIndex }}"
                       href="#collapse{{ $accordionIndex . $loop->index}}">{{ $category->name }} @if($category->isFinal())
                            <i>(final)</i> @endif
                    </a>
                </h4>
            </div>
            <div class="col-md-2">
                @include('dashboard.category.actions')
            </div>
        </div>
    </div>
    <div id="collapse{{ $accordionIndex . $loop->index }}" class="panel-collapse collapse">

        @if(!$category->children->isEmpty())
            @php $accordionIndex = $category->id @endphp
            <div class="panel-body">
                <div class="panel-group margin-bottom-none" id="accordion{{ $accordionIndex }}">
                    @foreach($category->children as $category)
                        @include('dashboard.category.group')
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
