<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::number('project_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mail Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_type', 'Mail Type:') !!}
    {!! Form::text('mail_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mail Type Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_type_code', 'Mail Type Code:') !!}
    {!! Form::text('mail_type_code', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Last Mail Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_mail_number', 'Last Mail Number:') !!}
    {!! Form::text('last_mail_number', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Is Transmittal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_transmittal', 'Is Transmittal:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_transmittal', 0) !!}
        {!! Form::checkbox('is_transmittal', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mailTypes.index') }}" class="btn btn-light">Cancel</a>
</div>
