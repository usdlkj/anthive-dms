@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Documents</h1>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-primary"
                       href="{{ route('projects.documents.create', $projectId) }}">
                        Add New
                    </a>

                    <button class="btn btn-outline-secondary" id="show-all"
                        onclick="showAll()">
                        Show All
                    </button>

                    <button class="btn btn-outline-secondary" id="show-active" style="display:none"
                        onclick="showActive()">
                        Show Active
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
                @include('documents.table')

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
    var table = $('#documents-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('projects.documents.index', $projectId) }}",
        columns: [{
                data: 'docnum',
                name: 'docnum'
            },
            {
                data: 'doctype',
                name: 'doctype'
            },
            {
                data: 'revision',
                name: 'revision'
            },
            {
                data: 'revdate',
                name: 'revdate'
            },
            {
                data: 'action',
                name: 'action'
            }
        ]
    });
});

function showAll() {
    $('#documents-table').DataTable()
        .ajax.url("{{ route('projects.documents.showAll', $projectId) }}")
        .load();

    $('#show-all').hide();
    $('#show-active').show();
}

function showActive() {
    $('#documents-table').DataTable()
        .ajax.url("{{ route('projects.documents.index', $projectId) }}")
        .load();

    $('#show-active').hide();
    $('#show-all').show();
}
</script>
@endpush