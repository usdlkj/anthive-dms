@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Project User</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card col-sm-6">

            {!! Form::model($projectUser, ['route' => ['projects.users.update', [$projectUser->project_id, $projectUser->user_id]], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('project_users.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('projects.users.index', $projectUser->project_id) }}" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

        </div>
    </div>
@endsection
