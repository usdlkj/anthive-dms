<!-- Project Field Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_field_id', 'Project Field Id:') !!}
    {!! Form::number('project_field_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Value Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value_code', 'Value Code:') !!}
    {!! Form::text('value_code', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Value Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value_text', 'Value Text:') !!}
    {!! Form::text('value_text', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('selectValues.index') }}" class="btn btn-light">Cancel</a>
</div>
