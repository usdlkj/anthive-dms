@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>{{$project->project_name}} Add User</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card col-sm-6">

            {!! Form::open(['route' => ['projects.users.store', $project->id]]) !!}

            <div class="card-body">

                <div class="row">
                    @include('project_users.fields')
                </div>

                <div class="row" style="padding-left: 7px">
                    {!! Form::submit('Add User', ['class' => 'btn btn-primary']) !!}&nbsp;
                    <a href="{{ route('projects.users.index', [$project->id]) }}" class="btn btn-default">Cancel</a>
                </div>

            </div>

            

            {!! Form::close() !!}

        </div>
    </div>
@endsection
