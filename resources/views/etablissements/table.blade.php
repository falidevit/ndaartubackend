<table class="table table-responsive" id="etablissements-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Adresse</th>
        <th>Email</th>
        <th>Phone</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($etablissements as $etablissements)
        <tr>
            <td>{!! $etablissements->name !!}</td>
            <td>{!! $etablissements->adresse !!}</td>
            <td>{!! $etablissements->email !!}</td>
            <td>{!! $etablissements->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['etablissements.destroy', $etablissements->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('etablissements.show', [$etablissements->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('etablissements.edit', [$etablissements->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>