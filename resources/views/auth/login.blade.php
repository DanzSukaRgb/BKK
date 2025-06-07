@extends('layouts.app')

@section('title', 'Login')

@section('styles')
<style>
    :root {
        --navbar-height: 56px; /* Default navbar height, adjustable */
    }

    body, html {
        height: 100%;
        margin: 0;
    }

    .login-page-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        padding: clamp(10px, 5vw, 20px);
        padding-top: calc(var(--navbar-height) + clamp(10px, 5vw, 20px)); /* Account for fixed navbar */
    }

    .login-card {
        width: 100%;
        max-width: clamp(300px, 80vw, 400px); /* Responsive max-width */
        padding: clamp(15px, 5vw, 25px); /* Smaller padding on small screens */
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .login-card h4 {
        font-size: clamp(1.5rem, 5vw, 1.75rem); /* Responsive heading */
    }

    .form-control, .btn {
        min-height: 44px; /* Touch-friendly height */
        font-size: clamp(0.9rem, 4vw, 1rem);
    }

    .alert-danger {
        max-height: 150px; /* Prevent overflow on small screens */
        overflow-y: auto;
        font-size: clamp(0.85rem, 3.5vw, 0.95rem);
    }

    .form-check-label, .small, .text-decoration-none {
        font-size: clamp(0.85rem, 3.5vw, 0.95rem);
    }

    @media (max-width: 576px) {
        .login-card {
            padding: 15px;
        }
        .login-card h4 {
            margin-bottom: 15px;
        }
        .mb-3 {
            margin-bottom: 12px !important; /* Tighter spacing */
        }
        .d-grid {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    }

    @media (max-width: 360px) {
        .login-card {
            padding: 10px;
        }
        .form-control, .btn {
            min-height: 40px; /* Slightly smaller for tiny screens */
        }
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

            <a href="{{ route('register') }}" class="small d-block text-center">
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
