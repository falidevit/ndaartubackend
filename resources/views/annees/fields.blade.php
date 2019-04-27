<!-- Annee Academique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee_academique', 'Annee Academique:') !!}
    {!! Form::text('annee_academique', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('annees.index') !!}" class="btn btn-default">Cancel</a>
</div>
