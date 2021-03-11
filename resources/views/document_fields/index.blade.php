@extends('layouts.app')
@section('title')
    Document Fields 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Document Fields</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('documentFields.create')}}" class="btn btn-primary form-btn">Document Field <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('document_fields.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

