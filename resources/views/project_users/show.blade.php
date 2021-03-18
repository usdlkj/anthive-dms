@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project User Details</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default float-right"
                       href="{{ route('projects.users.index', $projectUser->project_id) }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card col-sm-6">

            <div class="card-body">
                <div class="row">
                    @include('project_users.show_fields')
                </div>
            </div>

        </div>
    </div>
@endsection
