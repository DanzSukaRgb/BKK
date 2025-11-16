@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="auth-page-wrapper">
    <div class="auth-card">
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
{{--  --}}
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

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="text-center mb-3">
                Belum Punya Akun?
                <a href="{{ route('register') }}" class="text-decoration-none">Register di sini</a>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center">
                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection
