<table class="table table-responsive" id="absences-table">
    <thead>
        <tr>
            <th>Date</th>
        <th>Heure</th>
        <th>Eleve Id</th>
        <th>Classes Id</th>
        <th>Matieres Id</th>
        <th>Annees Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($absences as $absences)
        <tr>
            <td>{!! $absences->date !!}</td>
            <td>{!! $absences->heure !!}</td>
            <td>{!! $absences->eleve_id !!}</td>
            <td>{!! $absences->classes_id !!}</td>
            <td>{!! $absences->matieres_id !!}</td>
            <td>{!! $absences->annees_id !!}</td>
            <td>
                {!! Form::open(['route' => ['absences.destroy', $absences->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('absences.show', [$absences->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('absences.edit', [$absences->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>