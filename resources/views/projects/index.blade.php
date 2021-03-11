@extends('layouts.app')
@section('title')
    Projects 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Projects</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('projects.create')}}" class="btn btn-primary form-btn">Project <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('projects.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

