<table class="table table-responsive" id="annees-table">
    <thead>
        <tr>
            <th>Annee Academique</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($annees as $annees)
        <tr>
            <td>{!! $annees->annee_academique !!}</td>
            <td>
                {!! Form::open(['route' => ['annees.destroy', $annees->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('annees.show', [$annees->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('annees.edit', [$annees->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>