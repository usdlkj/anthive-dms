<!-- Document Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_code', 'Document Code:') !!}
    {!! Form::text('document_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::number('project_id', null, ['class' => 'form-control']) !!}
</div>

<!-- File Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('file_id', 'File Id:') !!}
    {!! Form::number('file_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version', 'Version:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('version', 0) !!}
        {!! Form::checkbox('version', '1', null) !!}
    </label>
</div>


<!-- Latest Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latest_version', 'Latest Version:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('latest_version', 0) !!}
        {!! Form::checkbox('latest_version', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('documents.index') }}" class="btn btn-light">Cancel</a>
</div>
