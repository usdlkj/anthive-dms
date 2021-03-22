@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documents</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('projects.documents.create', $projectId) }}">
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
</script>
@endpush