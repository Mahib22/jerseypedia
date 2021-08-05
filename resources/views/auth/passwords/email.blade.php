@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 mt-2 mb-3">
                <div class="card-body p-4 p-sm-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3 class="card-title text-center mb-3 fw-light fs-5">Reset Password</h3>
                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary btn-block text-uppercase fw-bold" type="submit">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
