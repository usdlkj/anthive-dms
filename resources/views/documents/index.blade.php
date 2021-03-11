@extends('layouts.app')
@section('title')
    Documents 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Documents</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('documents.create')}}" class="btn btn-primary form-btn">Document <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('documents.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

