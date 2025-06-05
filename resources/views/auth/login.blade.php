@extends('layouts.app')

@section('title', 'Login')

@section('styles')
<style>
    body, html {
        height: 100%;
    }

    .login-page-wrapper {
        min-height: calc(100vh - 56px); /* 56px untuk tinggi navbar (standar Bootstrap) */
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        padding: 20px;
    }

    .login-card {
        width: 100%;
        max-width: 400px;
        padding: 30px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
</style>
@endsection

@section('content')
<div class="login-page-wrapper">
    <div class="login-card">
        <h4 class="mb-4 text-center text-primary">Login</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox"
                       name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember Me
                </label>
            </div>
            <div class="d-grid mt-3 mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <a href="{{ route('register') }}" class="small">
                Belum Punya Akun? Silahkan Registrasi di sini
            </a>

            @if (Route::has('password.request'))
                <div class="mt-3 text-center">
                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
