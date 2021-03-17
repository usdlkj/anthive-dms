@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Project Field</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($projectField, ['route' => ['projects.fields.update', $projectField->project_id, $projectField->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('project_fields.fields')
                </div>
                <div class="row">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}&nbsp;
                    {!! Form::close() !!}
                    <a href="/projects/{{$projectId}}/fields" class="btn btn-default">Cancel</a>&nbsp;
                    {!! Form::model($projectField, ['route' => ['projects.fields.destroy', $projectField->project_id, $projectField->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
