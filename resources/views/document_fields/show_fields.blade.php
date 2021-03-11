<!-- Document Id Field -->
<div class="form-group">
    {!! Form::label('document_id', 'Document Id:') !!}
    <p>{{ $documentField->document_id }}</p>
</div>

<!-- Field Code Field -->
<div class="form-group">
    {!! Form::label('field_code', 'Field Code:') !!}
    <p>{{ $documentField->field_code }}</p>
</div>

<!-- Field Value Field -->
<div class="form-group">
    {!! Form::label('field_value', 'Field Value:') !!}
    <p>{{ $documentField->field_value }}</p>
</div>

