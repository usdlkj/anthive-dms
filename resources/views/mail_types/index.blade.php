@extends('layouts.app')
@section('title')
    Mail Types 
@endsection
@section('css')
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mail Types</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('mailTypes.create')}}" class="btn btn-primary form-btn">Mail Type <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    @include('mail_types.table')
                    @include('mail_types.templates.templates')
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        let recordsURL = "{{ route('mailTypes.index') }}/";
    </script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ mix('assets/js/custom/custom-datatable.js') }}"></script>
    <script src="{{mix('assets/js/mail_types/mail_types.js')}}"></script>
@endsection
