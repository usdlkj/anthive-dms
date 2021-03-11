@extends('layouts.app')
@section('title')
    Project Fields 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Project Fields</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('projectFields.create')}}" class="btn btn-primary form-btn">Project Field <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('project_fields.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

