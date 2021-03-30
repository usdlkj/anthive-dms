@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mail Type Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('projects.mailTypes.index', [$mailType->project_id]) }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">

            <div class="card-body">
                <div class="row">
                    @include('mail_types.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
