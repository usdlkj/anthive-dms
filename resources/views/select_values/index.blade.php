@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Select Values</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="/projects/{{$projectId}}/fields/{{$fieldId}}/selects/create">
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
                @include('select_values.table')

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
    var table = $('#selectValues-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/projects/{{$projectId}}/fields/{{$fieldId}}/selects",
        columns: [{
                data: 'field_text',
                name: 'field_text'
            },
            {
                data: 'value_code',
                name: 'value_code'
            },
            {
                data: 'value_text',
                name: 'value_text'
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