<!-- Document Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('document_id', 'Document Id:') !!}
    {!! Form::number('document_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Field Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_code', 'Field Code:') !!}
    {!! Form::text('field_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Field Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('field_value', 'Field Value:') !!}
    {!! Form::text('field_value', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('documentFields.index') }}" class="btn btn-light">Cancel</a>
</div>
