@extends('layouts.app')
@section('title')
    Select Values 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Select Values</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('selectValues.create')}}" class="btn btn-primary form-btn">Select Value <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('select_values.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

