@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s1.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Patient Management System (PMS)</h5>
                    <p class="card-text">This module will cater for patient registration, appointment and billing.</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('pms') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s1.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Consultation Information System (CIS)</h5>
                    <p class="card-text">This module will cater for patient registration, appointment and billing.</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('cis') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s1.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Prescription Information System (PIS)</h5>
                    <p class="card-text">This module will cater for patient registration, appointment and billing.</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('pis') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
