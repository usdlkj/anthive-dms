@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Select Value</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($selectValue, ['route' => ['projects.fields.selects.update', $projectId, $fieldId, $selectValue->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('select_values.fields')
                </div>

                <div class="row">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}&nbsp;
                    {!! Form::close() !!}
                    <a href="{{ route('projects.fields.selects.index', [$projectId, $fieldId]) }}" class="btn btn-default">Cancel</a>&nbsp;
                    {!! Form::model($selectValue, ['route' => ['projects.fields.selects.destroy', $projectId, $fieldId, $selectValue->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
