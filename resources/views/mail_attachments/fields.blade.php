<!-- Mail Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_id', 'Mail Id:') !!}
    {!! Form::number('mail_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Attachment Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attachment_id', 'Attachment Id:') !!}
    {!! Form::number('attachment_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Attachment Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('attachment_type', 'Attachment Type:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('attachment_type', 0) !!}
        {!! Form::checkbox('attachment_type', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mailAttachments.index') }}" class="btn btn-light">Cancel</a>
</div>
