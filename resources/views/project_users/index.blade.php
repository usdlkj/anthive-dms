@extends('layouts.app')
@section('title')
    Project Users 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Project Users</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('projectUsers.create')}}" class="btn btn-primary form-btn">Project User <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('project_users.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

