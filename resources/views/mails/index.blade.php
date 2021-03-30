@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Mails</h1>
                </div>
                <div class="col-sm-3 text-right">
                    <a class="btn btn-primary"
                       href="{{ route('projects.mails.create', $projectId) }}">
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
                @include('mails.table')

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
    var table = $('#mails-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('projects.mails.index', $projectId) }}",
        columns: [{
                data: 'mail_code',
                name: 'mail_code'
            },
            {
                data: 'mail_type',
                name: 'mail_type'
            },
            {
                data: 'subject',
                name: 'subject'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
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