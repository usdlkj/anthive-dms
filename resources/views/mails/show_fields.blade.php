<!-- Thread Starter Id Field -->
<div class="form-group">
    {!! Form::label('thread_starter_id', 'Thread Starter Id:') !!}
    <p>{{ $mail->thread_starter_id }}</p>
</div>

<!-- Previous Mail Id Field -->
<div class="form-group">
    {!! Form::label('previous_mail_id', 'Previous Mail Id:') !!}
    <p>{{ $mail->previous_mail_id }}</p>
</div>

<!-- Mail Type Id Field -->
<div class="form-group">
    {!! Form::label('mail_type_id', 'Mail Type Id:') !!}
    <p>{{ $mail->mail_type_id }}</p>
</div>

<!-- Sender Id Field -->
<div class="form-group">
    {!! Form::label('sender_id', 'Sender Id:') !!}
    <p>{{ $mail->sender_id }}</p>
</div>

<!-- Mail Code Field -->
<div class="form-group">
    {!! Form::label('mail_code', 'Mail Code:') !!}
    <p>{{ $mail->mail_code }}</p>
</div>

<!-- Mail Status Field -->
<div class="form-group">
    {!! Form::label('mail_status', 'Mail Status:') !!}
    <p>{{ $mail->mail_status }}</p>
</div>

<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{{ $mail->subject }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $mail->message }}</p>
</div>

