@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-lg-6 col-md-12 col-sm-12 mx-auto">
        <h3 class="card-header text-center fw-bold">{{ __('Register') }}</h3>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3 row">
                    <label for="name" class="col-lg-4 col-md-12 col-form-label">{{ __('Name') }}</label>

                    <div class="col-lg-8 col-md-12">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" oninput="this.value = this.value.toUpperCase()" style="text-transform:uppercase" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

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
                    <label for="password-confirm" class="col-lg-4 col-md-12 col-form-label">{{ __('Confirm Password') }}</label>

                    <div class="col-lg-8 col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-3 row">
                    <div class="col-6">
                        <button type="submit" class="col-12 btn btn-primary">
                            {{ __('Register') }}
                        </button>  
                    </div> 
                    <div class="col-6"> 
                        <button type="reset" class="col-12 btn btn-warning">
                            {{ __('Reset') }}
                        </button>                    
                    </div>           
                </div>

                <div class="mt-3 row">
                    <div class="col-12 text-center">                                      
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Already Registered? Login Here') }}
                        </a>
                    </div> 
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
