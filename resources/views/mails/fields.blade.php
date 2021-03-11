<!-- Thread Starter Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('thread_starter_id', 'Thread Starter Id:') !!}
    {!! Form::number('thread_starter_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Previous Mail Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('previous_mail_id', 'Previous Mail Id:') !!}
    {!! Form::number('previous_mail_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mail Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_type_id', 'Mail Type Id:') !!}
    {!! Form::number('mail_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sender Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sender_id', 'Sender Id:') !!}
    {!! Form::number('sender_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mail Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_code', 'Mail Code:') !!}
    {!! Form::text('mail_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mail Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_status', 'Mail Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('mail_status', 0) !!}
        {!! Form::checkbox('mail_status', '1', null) !!}
    </label>
</div>


<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mails.index') }}" class="btn btn-light">Cancel</a>
</div>
