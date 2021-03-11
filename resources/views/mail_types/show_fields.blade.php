<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', 'Project Id:') !!}
    <p>{{ $mailType->project_id }}</p>
</div>

<!-- Mail Type Field -->
<div class="form-group">
    {!! Form::label('mail_type', 'Mail Type:') !!}
    <p>{{ $mailType->mail_type }}</p>
</div>

<!-- Mail Type Code Field -->
<div class="form-group">
    {!! Form::label('mail_type_code', 'Mail Type Code:') !!}
    <p>{{ $mailType->mail_type_code }}</p>
</div>

<!-- Last Mail Number Field -->
<div class="form-group">
    {!! Form::label('last_mail_number', 'Last Mail Number:') !!}
    <p>{{ $mailType->last_mail_number }}</p>
</div>

<!-- Is Transmittal Field -->
<div class="form-group">
    {!! Form::label('is_transmittal', 'Is Transmittal:') !!}
    <p>{{ $mailType->is_transmittal }}</p>
</div>

