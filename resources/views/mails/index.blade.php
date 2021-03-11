@extends('layouts.app')
@section('title')
    Mails 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mails</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('mails.create')}}" class="btn btn-primary form-btn">Mail <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('mails.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

