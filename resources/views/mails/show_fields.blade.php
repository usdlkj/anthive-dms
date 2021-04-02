<!-- Mail Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_type_id', 'Mail Type Id:') !!}
    <p>{{ $mail->mailType->mail_type }}</p>
</div>

<!-- Sender Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sender_id', 'Sender:') !!}
    <p>{{ $mail->sender->name }}</p>
</div>

<!-- Mail Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_code', 'Mail Code:') !!}
    <p>{{ $mail->mail_code }}</p>
</div>

<!-- Mail Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_status', 'Mail Status:') !!}
    <p>
    @if($mail->mail_status == \App\Models\Mail::MAIL_STATUS_DRAFT)
    Draft
    @elseif ($mail->mail_status == \App\Models\Mail::MAIL_STATUS_SENT)
    Sent
    @endif
    </p>
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{{ $mail->subject }}</p>
</div>

<!-- Message Field -->
<div class="form-group col-sm-12">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $mail->message }}</p>
</div>

