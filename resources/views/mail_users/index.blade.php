@extends('layouts.app')
@section('title')
    Mail Users 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mail Users</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('mailUsers.create')}}" class="btn btn-primary form-btn">Mail User <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('mail_users.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

