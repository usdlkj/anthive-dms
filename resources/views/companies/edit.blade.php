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
                <div class="row">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}&nbsp;
                    {!! Form::close() !!}
                    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>&nbsp;
                    <form action="/companies/{{$company->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
