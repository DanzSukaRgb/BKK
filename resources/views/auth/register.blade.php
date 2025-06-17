@extends('layouts.app')

@section('title', 'Register')

@section('content')
<br><br><br>
<div class="auth-page-wrapper">
    <div class="auth-card">
        <h4 class="mb-4 text-center text-primary">Register</h4>

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
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required>
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

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                <input id="password-confirm" type="password"
                       class="form-control @error('password_confirmation') is-invalid @enderror"
                       name="password_confirmation" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Daftar</button>
            </div>

            <div class="mt-3 text-center">
                Sudah punya akun?
                <a class="text-decoration-none" href="{{ route('login') }}">
                    Login di sini
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
