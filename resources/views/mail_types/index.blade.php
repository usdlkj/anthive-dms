@extends('layouts.app')
@section('title')
    Mail Types 
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
            </div>
       </div>
   </div>
    
    </section>
@endsection

