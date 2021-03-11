<!-- Project Name Field -->
<div class="form-group">
    {!! Form::label('project_name', 'Project Name:') !!}
    <p>{{ $project->project_name }}</p>
</div>

<!-- Project Code Field -->
<div class="form-group">
    {!! Form::label('project_code', 'Project Code:') !!}
    <p>{{ $project->project_code }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $project->description }}</p>
</div>

<!-- Project Owner Id Field -->
<div class="form-group">
    {!! Form::label('project_owner_id', 'Project Owner Id:') !!}
    <p>{{ $project->project_owner_id }}</p>
</div>

