<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', 'Project Id:') !!}
    <p>{{ $projectField->project_id }}</p>
</div>

<!-- Field Code Field -->
<div class="form-group">
    {!! Form::label('field_code', 'Field Code:') !!}
    <p>{{ $projectField->field_code }}</p>
</div>

<!-- Field Type Field -->
<div class="form-group">
    {!! Form::label('field_type', 'Field Type:') !!}
    <p>{{ $projectField->field_type }}</p>
</div>

<!-- Field Text Field -->
<div class="form-group">
    {!! Form::label('field_text', 'Field Text:') !!}
    <p>{{ $projectField->field_text }}</p>
</div>

<!-- Visible Field -->
<div class="form-group">
    {!! Form::label('visible', 'Visible:') !!}
    <p>{{ $projectField->visible }}</p>
</div>

<!-- Mandatory Field -->
<div class="form-group">
    {!! Form::label('mandatory', 'Mandatory:') !!}
    <p>{{ $projectField->mandatory }}</p>
</div>

<!-- Sequence Field -->
<div class="form-group">
    {!! Form::label('sequence', 'Sequence:') !!}
    <p>{{ $projectField->sequence }}</p>
</div>

