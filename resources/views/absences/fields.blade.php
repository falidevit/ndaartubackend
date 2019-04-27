<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Eleve Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    {!! Form::text('eleve_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Classes Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('classes_id', 'Classes Id:') !!}
    {!! Form::text('classes_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Matieres Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matieres_id', 'Matieres Id:') !!}
    {!! Form::text('matieres_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Annees Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annees_id', 'Annees Id:') !!}
    {!! Form::text('annees_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('absences.index') !!}" class="btn btn-default">Cancel</a>
</div>
