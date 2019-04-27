<table class="table table-responsive" id="usersMatieres-table">
    <thead>
        <tr>
            
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($usersMatieres as $usersMatieres)
        <tr>
            
            <td>
                {!! Form::open(['route' => ['usersMatieres.destroy', $usersMatieres->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('usersMatieres.show', [$usersMatieres->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('usersMatieres.edit', [$usersMatieres->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>