@extends('layouts.app')
@section('title')
    Companies 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Companies</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('companies.create')}}" class="btn btn-primary form-btn">Company <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('companies.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

