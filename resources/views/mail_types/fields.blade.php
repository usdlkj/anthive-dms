<!-- Mail Type Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_type_code', 'Mail Type Code:') !!}
    {!! Form::text('mail_type_code', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Mail Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_type', 'Mail Type:') !!}
    {!! Form::text('mail_type', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Is Transmittal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_transmittal', 'Is Transmittal:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_transmittal', 0) !!}
        {!! Form::checkbox('is_transmittal', '1', null) !!}
    </label>
</div>
