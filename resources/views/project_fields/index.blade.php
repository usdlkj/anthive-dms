@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Fields</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="/projects/{{$projectId}}/fields/create">
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
                @include('project_fields.table')

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
    var table = $('#projectFields-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/projects/{{$projectId}}/fields",
        columns: [{
                data: 'field_code',
                name: 'field_code'
            },
            {
                data: 'fieldTypeText',
                name: 'fieldTypeText'
            },
            {
                data: 'field_text',
                name: 'field_text'
            },
            {
                data: 'visibleText',
                name: 'visibleText'
            },
            {
                data: 'mandatoryText',
                name: 'mandatoryText'
            },
            {
                data: 'sequence',
                name: 'sequence'
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