<table class="table table-responsive" id="justifications-table">
    <thead>
        <tr>
            <th>Motif</th>
        <th>Preuve Path</th>
        <th>Absences Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($justifications as $justifications)
        <tr>
            <td>{!! $justifications->motif !!}</td>
            <td>{!! $justifications->preuve_path !!}</td>
            <td>{!! $justifications->absences_id !!}</td>
            <td>
                {!! Form::open(['route' => ['justifications.destroy', $justifications->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('justifications.show', [$justifications->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('justifications.edit', [$justifications->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>