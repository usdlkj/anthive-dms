@extends('layouts.app')
@section('title')
    Company Documents 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Company Documents</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('companyDocuments.create')}}" class="btn btn-primary form-btn">Company Document <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('company_documents.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

