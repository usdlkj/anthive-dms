<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at', 'disabled']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Phone Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number', 'Phone Number:') !!}
    {!! Form::text('phone_number', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Role Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    <select class="form-control" name="role">
        <option value="{{App\Models\User::ROLE_SUPER_ADMIN}}"
            @if (isset($user) && $user->role == App\Models\User::ROLE_SUPER_ADMIN) 
            selected 
            @endif
            >Super Admin</option>
        <option value="{{App\Models\User::ROLE_OPS_ADMIN}}"
            @if (isset($user) && $user->role == App\Models\User::ROLE_OPS_ADMIN) 
            selected 
            @endif
            >Ops Admin</option>
        <option value="{{App\Models\User::ROLE_COMPANY_ADMIN}}"
            @if (isset($user) && $user->role == App\Models\User::ROLE_COMPANY_ADMIN) 
            selected 
            @endif>Company Admin</option>
        <option value="{{App\Models\User::ROLE_MANAGER}}"
            @if (isset($user) && $user->role == App\Models\User::ROLE_MANAGER) 
            selected 
            @endif>Manager</option>
        <option value="{{App\Models\User::ROLE_STAFF}}"
            @if (isset($user) && $user->role == App\Models\User::ROLE_STAFF) 
            selected 
            @endif>Staff</option>
    </select>
</div>