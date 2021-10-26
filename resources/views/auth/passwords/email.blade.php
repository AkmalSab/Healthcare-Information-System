@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header text-center fw-bold">{{ __('Reset Password') }}</h3>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="email" class="col-lg-4 col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-lg-8 col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2 col-lg-6 col-md-12 col-sm-12">
                                <button type="submit" class="col-12 btn btn-primary text-white">
                                {{ __('Send Password Reset Link') }}
                                </button>  
                            </div> 
                            <div class="col-lg-6 col-md-12 col-sm-12"> 
                                <button type="reset" class="col-12 btn btn-warning">
                                    {{ __('Reset') }}
                                </button>                    
                            </div>           
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection