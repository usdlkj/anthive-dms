@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mail Types</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('projects.mailTypes.create', [$projectId]) }}">
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
            @include('mail_types.table')

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
    var table = $('#mail-types-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('projects.mailTypes.index', [$projectId]) }}",
        columns: [{
                data: 'mail_type_code',
                name: 'mail_type_code'
            },
            {
                data: 'mail_type',
                name: 'mail_type'
            },
            {
                data: 'is_transmittal',
                name: 'is_transmittal'
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
