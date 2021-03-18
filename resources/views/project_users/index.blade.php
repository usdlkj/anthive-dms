@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$project->project_name}} Users</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('projects.users.create', [$project->id]) }}">
                        Add New
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card col-sm-6">
            <div class="card-body p-0">
                @include('project_users.table')

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
    var table = $('#projectUsers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/projects/{{$project->id}}/users",
        columns: [{
                data: 'name',
                name: 'name'
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