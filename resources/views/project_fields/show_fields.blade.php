<!-- Project Id Field -->
<div class="col-sm-6">
    {!! Form::label('project_name', 'Project:') !!}
    <p>{{ $projectField->project->project_name }}</p>
</div>

<!-- Field Code Field -->
<div class="col-sm-6">
    {!! Form::label('field_code', 'Field Code:') !!}
    <p>{{ $projectField->field_code }}</p>
</div>

<!-- Field Type Field -->
<div class="col-sm-6">
    {!! Form::label('field_type', 'Field Type:') !!}
    <p><?php 
        switch ($projectField->field_type)
        {
            case 1: echo 'Short Text'; break;
            case 2: echo 'Text'; break;
            case 3: echo 'Text Area'; break;
            case 4: echo 'Date'; break;
            case 5: echo 'Single Select'; break;
            case 6: echo 'Multi Select'; break;
        }
    ?></p>
</div>

<!-- Field Text Field -->
<div class="col-sm-6">
    {!! Form::label('field_text', 'Field Text:') !!}
    <p>{{ $projectField->field_text }}</p>
</div>

<!-- Visible Field -->
<div class="col-sm-6">
    {!! Form::label('visible', 'Visible:') !!}
    <p>{{ $projectField->visible ? 'Yes' : 'No' }}</p>
</div>

<!-- Mandatory Field -->
<div class="col-sm-6">
    {!! Form::label('mandatory', 'Mandatory:') !!}
    <p>{{ $projectField->mandatory ? 'Yes' : 'No'}}</p>
</div>

<!-- Sequence Field -->
<div class="col-sm-6">
    {!! Form::label('sequence', 'Sequence:') !!}
    <p>{{ $projectField->sequence }}</p>
</div>

