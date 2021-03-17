@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit User</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($user, ['route' => ['companies.users.update', $user->company_id, $user->id], 'method' => 'patch']) !!}
            
            <div class="card-body">
                <div class="row">
                    @include('users.fields')
                </div>

                <div class="row" style="padding-left: 7px">
                    <button type="submit" class="btn btn-primary">Save</button>&nbsp;
                    {!! Form::close() !!}
                    <a href="/companies/{{$user->company_id}}/users" class="btn btn-default">Cancel</a>&nbsp;
                    {!! Form::model($user, ['route' => ['companies.users.destroy', $user->company_id, $user->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
