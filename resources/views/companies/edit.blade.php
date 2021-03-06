@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Edit Company</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('companies.fields')
                </div>
                <div class="row" style="padding-left: 7px">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}&nbsp;
                    {!! Form::close() !!}
                    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>&nbsp;
                    {!! Form::model($company, ['route' => ['companies.destroy', $company->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger']) !!}
                </div>
            </div>

            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
