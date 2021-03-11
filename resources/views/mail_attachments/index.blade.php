@extends('layouts.app')
@section('title')
    Mail Attachments 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mail Attachments</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('mailAttachments.create')}}" class="btn btn-primary form-btn">Mail Attachment <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('mail_attachments.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

