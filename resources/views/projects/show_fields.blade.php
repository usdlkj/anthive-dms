<!-- Project Name Field -->
<div class="col-sm-6">
    {!! Form::label('project_name', 'Project Name:') !!}
    <p>{{ $project->project_name }}</p>
</div>

<!-- Project Code Field -->
<div class="col-sm-6">
    {!! Form::label('project_code', 'Project Code:') !!}
    <p>{{ $project->project_code }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $project->description }}</p>
</div>

<!-- Location Field -->
<div class="col-sm-6">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $project->location }}</p>
</div>

<!-- City Field -->
<div class="col-sm-6">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $project->city }}</p>
</div>

<!-- Country Field -->
<div class="col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $project->country }}</p>
</div>

<!-- Start Date Field -->
<div class="col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p><?php echo date_format($project->start_date, 'd-M-Y');?></p>
</div>

<!-- End Date Field -->
<div class="col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    <p><?php if (!is_null($project->end_date)) {
        echo date_format($project->end_date, 'd-M-Y');
    }?></p>
</div>

<!-- Project Value Field -->
<div class="col-sm-6">
    {!! Form::label('project_value', 'Project Value:') !!}
    <p><?php if (!is_null($project->project_value)) {
        echo number_format($project->project_value);
    }?></p>
</div>

<!-- Project Owner Field -->
<div class="col-sm-6">
    {!! Form::label('project_owner_id', 'Project Owner:') !!}
    <p>{{ $project->projectOwner->company_name }}</p>
</div>

