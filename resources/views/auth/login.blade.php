@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-lg-6 col-md-12 col-sm-12 mx-auto">
        <h3 class="card-header text-center fw-bold">{{ __('Login') }}</h3>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
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

                <div class="mb-3 row">
                    <label for="password" class="col-lg-4 col-md-12 col-form-label">{{ __('Password') }}</label>

                    <div class="col-lg-8 col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="col-12 btn btn-primary">
                            {{ __('Login') }}
                        </button>  
                    </div> 
                    <div class="col-6"> 
                        <input type="reset" class="col-12 btn btn-warning">            
                    </div>           
                </div>

                <div class="mt-3 row">
                    <div class="col-12 text-center">                        
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif                     
                    </div> 
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
