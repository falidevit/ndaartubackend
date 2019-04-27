<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $absences->id !!}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{!! $absences->date !!}</p>
</div>

<!-- Heure Field -->
<div class="form-group">
    {!! Form::label('heure', 'Heure:') !!}
    <p>{!! $absences->heure !!}</p>
</div>

<!-- Eleve Id Field -->
<div class="form-group">
    {!! Form::label('eleve_id', 'Eleve Id:') !!}
    <p>{!! $absences->eleve_id !!}</p>
</div>

<!-- Classes Id Field -->
<div class="form-group">
    {!! Form::label('classes_id', 'Classes Id:') !!}
    <p>{!! $absences->classes_id !!}</p>
</div>

<!-- Matieres Id Field -->
<div class="form-group">
    {!! Form::label('matieres_id', 'Matieres Id:') !!}
    <p>{!! $absences->matieres_id !!}</p>
</div>

<!-- Annees Id Field -->
<div class="form-group">
    {!! Form::label('annees_id', 'Annees Id:') !!}
    <p>{!! $absences->annees_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $absences->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $absences->updated_at !!}</p>
</div>

