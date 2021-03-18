<!-- Project Field -->
<div class="col-sm-6">
    {!! Form::label('project_name', 'Project:') !!}
    <p>{{ $projectUser->project->project_name }}</p>
</div>

<!-- User Field -->
<div class="col-sm-6">
    {!! Form::label('user', 'User:') !!}
    <p>{{ $projectUser->user->name }}</p>
</div>

