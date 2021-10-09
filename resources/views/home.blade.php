@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s1.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Patient Management System</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>                
                </div>
                <div class="m-4">   
                    <a href="{{ url('/pms') }}" class="btn btn-primary w-100">Visit</a>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s2.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Doctor-Patient Consultation</h5>
                    <p class="card-text">This is a short card.</p>                    
                </div>
                <div class="m-4">
                    <button type="button" class="btn btn-primary w-100">Visit</button>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s3.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pharmacy</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="m-4">
                    <button type="button" class="btn btn-primary w-100">Visit</button>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s4.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Billing</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>                
                </div>
                <div class="m-4">
                    <button type="button" class="btn btn-primary w-100">Visit</button>
                </div>
            </div>
        </div>
        <div class="col mb-3">
            <div class="card h-100">
                <img src="/img/s5.jpg" class="card-img-top" height="200" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Calling System</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="m-4">
                    <button type="button" class="btn btn-primary w-100">Visit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
