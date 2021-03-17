@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Project</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('projects.fields')
                </div>
                <div class="row" style="padding-left: 7px">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}&nbsp;
                    {!! Form::close() !!}
                    <a href="{{ route('projects.index') }}" class="btn btn-default">Cancel</a>&nbsp;
                    {!! Form::model($project, ['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
