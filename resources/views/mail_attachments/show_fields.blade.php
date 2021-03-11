<!-- Mail Id Field -->
<div class="form-group">
    {!! Form::label('mail_id', 'Mail Id:') !!}
    <p>{{ $mailAttachment->mail_id }}</p>
</div>

<!-- Attachment Id Field -->
<div class="form-group">
    {!! Form::label('attachment_id', 'Attachment Id:') !!}
    <p>{{ $mailAttachment->attachment_id }}</p>
</div>

<!-- Attachment Type Field -->
<div class="form-group">
    {!! Form::label('attachment_type', 'Attachment Type:') !!}
    <p>{{ $mailAttachment->attachment_type }}</p>
</div>

