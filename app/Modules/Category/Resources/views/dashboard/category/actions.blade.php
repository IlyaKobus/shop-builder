<div class="pull-right">
    <a href="{{route('categories.create', ['parentId' => $category->id])}}" class="btn btn-primary">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    <button class="btn btn-info btn-data-edit" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
    <button class="btn btn-danger btn-data-remove" title="Delete"><span class="glyphicon glyphicon-remove"></span>
    </button>

    {!!  Form::open(['route' => ['categories.edit', $category->id], 'method' => 'get', 'class' => 'form-data-edit']) !!}
    {!! Form::close() !!}

    {!!  Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'delete', 'class' => 'form-data-remove']) !!}
    {!! Form::close() !!}
</div>

<div class="clearfix grid-width-100"></div>
