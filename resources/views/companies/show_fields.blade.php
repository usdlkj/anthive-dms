<!-- Company Name Field -->
<div class="form-group">
    {!! Form::label('company_name', 'Company Name:') !!}
    <p>{{ $company->company_name }}</p>
</div>

<!-- Trading Name Field -->
<div class="form-group">
    {!! Form::label('trading_name', 'Trading Name:') !!}
    <p>{{ $company->trading_name }}</p>
</div>

<!-- Company Code Field -->
<div class="form-group">
    {!! Form::label('company_code', 'Company Code:') !!}
    <p>{{ $company->company_code }}</p>
</div>

