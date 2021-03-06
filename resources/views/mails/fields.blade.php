<!-- Mail Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mail_type_id', 'Mail Type:') !!}
    <select id="mail_type" name="mail_type" class="form-control">
        @foreach ($mailTypes as $mailType)
        <option value="{{$mailType->id}}">{{$mailType->mail_type}}</option>
        @endforeach
    </select>
</div>

<!-- Mail To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recipient_to', 'To:') !!}
    <select id="recipient_to" name="recipient_to[]" class="form-control select2" multiple="multiple">
        @foreach ($projectUsers as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
</div>

<!-- Subject Field -->
<div class="form-group col-sm-12">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>