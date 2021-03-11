<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::number('project_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Field Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_code', 'Field Code:') !!}
    {!! Form::text('field_code', null, ['class' => 'form-control','maxlength' => 10,'maxlength' => 10]) !!}
</div>

<!-- Field Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_type', 'Field Type:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('field_type', 0) !!}
        {!! Form::checkbox('field_type', '1', null) !!}
    </label>
</div>


<!-- Field Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_text', 'Field Text:') !!}
    {!! Form::text('field_text', null, ['class' => 'form-control','maxlength' => 20,'maxlength' => 20]) !!}
</div>

<!-- Visible Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visible', 'Visible:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('visible', 0) !!}
        {!! Form::checkbox('visible', '1', null) !!}
    </label>
</div>


<!-- Mandatory Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mandatory', 'Mandatory:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('mandatory', 0) !!}
        {!! Form::checkbox('mandatory', '1', null) !!}
    </label>
</div>


<!-- Sequence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sequence', 'Sequence:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('sequence', 0) !!}
        {!! Form::checkbox('sequence', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('projectFields.index') }}" class="btn btn-light">Cancel</a>
</div>
