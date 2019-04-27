<!-- Motif Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('motif', 'Motif:') !!}
    {!! Form::textarea('motif', null, ['class' => 'form-control']) !!}
</div>

<!-- Preuve Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('preuve_path', 'Preuve Path:') !!}
    {!! Form::text('preuve_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Absences Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('absences_id', 'Absences Id:') !!}
    {!! Form::text('absences_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('justifications.index') !!}" class="btn btn-default">Cancel</a>
</div>
