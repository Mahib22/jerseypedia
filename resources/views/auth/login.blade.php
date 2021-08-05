@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 mt-2 mb-3">
                <div class="card-body p-4 p-sm-5">
                    <h3 class="card-title text-center mb-3 fw-light fs-5">Login</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="row justify-content-between">
                            <div class="form-check mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="rememberPasswordCheck" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="rememberPasswordCheck">Remember Me</label>
                            </div>

                            <div class="mx-3">
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-block text-uppercase fw-bold" type="submit">Login</button>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                            <h5>Belum punya akun? <a class="text-decoration-none" href="{{ route('register') }}">Buat Akun</a></h5>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
