@extends('layouts.app')
@section('title')
    Files 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Files</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('files.create')}}" class="btn btn-primary form-btn">File <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('files.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

