<!-- Level Field -->
<div class="form-group col-sm-6">
    {!! Form::label('level', 'Level:') !!}
    {!! Form::text('level', null, ['class' => 'form-control']) !!}
</div>

<!-- Label Field -->
<div class="form-group col-sm-6">
    {!! Form::label('label', 'Label:') !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<!-- Surveillant Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('surveillant_id', 'Surveillant Id:') !!}
    {!! Form::text('surveillant_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('classes.index') !!}" class="btn btn-default">Cancel</a>
</div>
