@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s1.jpg" class="card-img-top" height="200" alt="PMS">
                <div class="card-body">
                    <h5 class="card-title">Patient Management System (PMS) ✅</h5>
                    <p class="card-text">This module will cater for patient registration, appointment and billing.</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('pms') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s2.jpg" class="card-img-top" height="200" alt="CIS">
                <div class="card-body">
                    <h5 class="card-title">Consultation Information System (CIS) ✅</h5>
                    <p class="card-text">This module will cater for patient consultation and immunisation record</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('cis') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s3.jpg" class="card-img-top" height="200" alt="PIS">
                <div class="card-body">
                    <h5 class="card-title">Prescription Information System (PIS) ✅</h5>
                    <p class="card-text">This module will cater for patient medicine and prescription.</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('pis') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s4.jpg" class="card-img-top" height="200" alt="LT">
                <div class="card-body">
                    <h5 class="card-title">Lookup Table (LT) ✅</h5>
                    <p class="card-text">This module will cater for system information references.</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('lt') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s5.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">ICD-10 Search Engine (ICD-10)✅</h5>
                    <p class="card-text">This module will cater for International Classification of Diseases</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('icd10') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s5.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Queue Management System (QMS) ✅</h5>
                    <p class="card-text">This module will cater for patient queue system.</p>
                </div>
                <div class="m-4">
                    <a href="{{ url('queue') }}" class="btn btn-primary w-100" style="color: white">Visit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
