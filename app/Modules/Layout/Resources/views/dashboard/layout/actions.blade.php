<div>
    <button class="btn btn-info btn-data-edit" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
    <button class="btn btn-danger btn-data-remove" title="Delete"><span class="glyphicon glyphicon-remove"></span>
    </button>

    {!!  Form::open(['route' => ['layouts.edit', $layout->id], 'method' => 'get', 'class' => 'form-data-edit']) !!}
    {!! Form::close() !!}

    {!!  Form::open(['route' => ['layouts.destroy', $layout->id], 'method' => 'delete', 'class' => 'form-data-remove']) !!}
    {!! Form::close() !!}
</div>