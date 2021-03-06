@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Companies</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('companies.create') }}">
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
            @include('companies.table')

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
    var table = $('#companies-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('companies.index') }}",
        columns: [{
                data: 'company_name',
                name: 'company_name'
            },
            {
                data: 'trading_name',
                name: 'trading_name'
            },
            {
                data: 'company_code',
                name: 'company_code'
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