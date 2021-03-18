<!-- File Name Field -->
<div class="col-sm-12">
    {!! Form::label('file_name', 'File Name:') !!}
    <p>{{ $file->file_name }}</p>
</div>

<!-- File Hash Field -->
<div class="col-sm-12">
    {!! Form::label('file_hash', 'File Hash:') !!}
    <p>{{ $file->file_hash }}</p>
</div>

<!-- Location Field -->
<div class="col-sm-12">
    {!! Form::label('location', 'Location:') !!}
    <p>{{ $file->location }}</p>
</div>

<!-- File Size Field -->
<div class="col-sm-12">
    {!! Form::label('file_size', 'File Size:') !!}
    <p>{{ $file->file_size }}</p>
</div>

<!-- Extension Field -->
<div class="col-sm-12">
    {!! Form::label('extension', 'Extension:') !!}
    <p>{{ $file->extension }}</p>
</div>

