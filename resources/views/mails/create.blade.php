@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Mail</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => ['projects.mails.store', $projectId]]) !!}

            <div class="card-body">

                <div class="row">
                    @include('mails.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('projects.mails.index', [$projectId]) }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection

@section('third_party_stylesheets')
<link href="/vendor/select2/select2.min.css" rel="stylesheet" />
@endsection

@push('scripts')
<script src="/vendor/select2/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#recipient_to').select2();
});
</script>
@endpush