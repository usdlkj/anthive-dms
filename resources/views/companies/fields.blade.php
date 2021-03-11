<!-- Company Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_name', 'Company Name:') !!}
    {!! Form::text('company_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Trading Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('trading_name', 'Trading Name:') !!}
    {!! Form::text('trading_name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Company Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_code', 'Company Code:') !!}
    {!! Form::text('company_code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-light">Cancel</a>
</div>
