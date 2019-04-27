<table class="table table-responsive" id="matieres-table">
    <thead>
        <tr>
            <th>Libelle</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($matieres as $matieres)
        <tr>
            <td>{!! $matieres->libelle !!}</td>
            <td>{!! $matieres->description !!}</td>
            <td>
                {!! Form::open(['route' => ['matieres.destroy', $matieres->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('matieres.show', [$matieres->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('matieres.edit', [$matieres->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>