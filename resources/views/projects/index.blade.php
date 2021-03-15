@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('projects.create') }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('projects.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#projects-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/projects",
        columns: [{
                data: 'project_name',
                name: 'project_name'
            },
            {
                data: 'project_code',
                name: 'project_code'
            },
            {
                data: 'location',
                name: 'location'
            },
            {
                data: 'city',
                name: 'city'
            },
            {
                data: 'country',
                name: 'country'
            },
            {
                data: 'startDate',
                name: 'startDate'
            },
            {
                data: 'projectValue',
                name: 'projectValue'
            },
            {
                data: 'project_owner_id',
                name: 'project_owner_id'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });
});
</script>
@endpush