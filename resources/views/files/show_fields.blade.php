<!-- File Name Field -->
<div class="form-group">
    {!! Form::label('file_name', 'File Name:') !!}
    <p>{{ $file->file_name }}</p>
</div>

<!-- File Hash Field -->
<div class="form-group">
    {!! Form::label('file_hash', 'File Hash:') !!}
    <p>{{ $file->file_hash }}</p>
</div>

<!-- Location Field -->
<div class="form-group">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $file->location }}</p>
</div>

<!-- File Size Field -->
<div class="form-group">
    {!! Form::label('file_size', 'File Size:') !!}
    <p>{{ $file->file_size }}</p>
</div>

<!-- Extension Field -->
<div class="form-group">
    {!! Form::label('extension', 'Extension:') !!}
    <p>{{ $file->extension }}</p>
</div>

