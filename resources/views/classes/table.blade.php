<table class="table table-responsive" id="classes-table">
    <thead>
        <tr>
            <th>Level</th>
        <th>Label</th>
        <th>Surveillant Id</th>
        <th>Etablissements Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($classes as $classes)
        <tr>
            <td>{!! $classes->level !!}</td>
            <td>{!! $classes->label !!}</td>
            <td>{!! $classes->surveillant_id !!}</td>
            <td>{!! $classes->etablissements_id !!}</td>
            <td>
                {!! Form::open(['route' => ['classes.destroy', $classes->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('classes.show', [$classes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('classes.edit', [$classes->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>