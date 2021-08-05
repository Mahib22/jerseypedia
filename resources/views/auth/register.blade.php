@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 mt-2 mb-3">
                <div class="card-body p-4 p-sm-5">
                    <h3 class="card-title text-center mb-3 fw-light fs-5">Buat Akun</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="floatingInput" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="floatingInput">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" value="{{ old('email') }}" required autocomplete="email">
                            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="floatingPassword">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <label for="floatingPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="floatingPassword" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary btn-block text-uppercase fw-bold" type="submit">Buat Akun</button>
                        </div>

                        <hr class="my-4">

                        <div class="text-center">
                            <h5>Sudah punya akun? <a class="text-decoration-none" href="{{ route('login') }}">Login</a></h5>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
