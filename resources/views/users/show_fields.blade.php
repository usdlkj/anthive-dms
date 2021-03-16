<!-- Name Field -->
<div class="col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $user->address }}</p>
</div>

<!-- City Field -->
<div class="col-sm-6">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $user->city }}</p>
</div>

<!-- Country Field -->
<div class="col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $user->country }}</p>
</div>

<!-- Phone Number Field -->
<div class="col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    <p>{{ $user->phone_number }}</p>
</div>

<!-- Position Field -->
<div class="col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    <p>{{ $user->position }}</p>
</div>

<!-- Role Field -->
<div class="col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    <p>
    @if ($user->role == App\Models\User::ROLE_SUPER_ADMIN) 
    Super Admin 
    @elseif ($user->role == App\Models\User::ROLE_OPS_ADMIN) 
    Ops Admin 
    @elseif ($user->role == App\Models\User::ROLE_COMPANY_ADMIN) 
    Company Admin 
    @elseif ($user->role == App\Models\User::ROLE_MANAGER) 
    Manager
    @else
    Staff
    @endif
    </p>
</div>
