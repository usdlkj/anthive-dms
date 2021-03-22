<!-- Document Code Field -->
<div class="col-sm-12">
    {!! Form::label('document_code', 'Document Code:') !!}
    <p>{{ $document->document_code }}</p>
</div>

<!-- Project Id Field -->
<div class="col-sm-12">
    {!! Form::label('project_id', 'Project Id:') !!}
    <p>{{ $document->project_id }}</p>
</div>

<!-- File Id Field -->
<div class="col-sm-12">
    {!! Form::label('file_id', 'File Id:') !!}
    <p>{{ $document->file_id }}</p>
</div>

<!-- Version Field -->
<div class="col-sm-12">
    {!! Form::label('version', 'Version:') !!}
    <p>{{ $document->version }}</p>
</div>

<!-- Latest Version Field -->
<div class="col-sm-12">
    {!! Form::label('latest_version', 'Latest Version:') !!}
    <p>{{ $document->latest_version }}</p>
</div>

