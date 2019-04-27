<table class="table table-responsive" id="presences-table">
    <thead>
        <tr>
            <th>Date</th>
        <th>Heure</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($presences as $presences)
        <tr>
            <td>{!! $presences->date !!}</td>
            <td>{!! $presences->heure !!}</td>
            <td>
                {!! Form::open(['route' => ['presences.destroy', $presences->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('presences.show', [$presences->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('presences.edit', [$presences->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>