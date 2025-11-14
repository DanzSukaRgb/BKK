<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Redirect sesuai role
            $role = Auth::user()->role;
            switch ($role) {
                case 'admin':
                    return redirect()->route('dashboard');
                case 'perusahaan':
                    return redirect()->route('perusahaan.dashboard');
                case 'alumni':
                    return redirect()->route('alumni.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors([
                        'email' => 'Role user tidak dikenali.'
                    ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ])->withInput();
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','min:6'],
            'role' => ['required','in:alumni,perusahaan,admin'] // pilih role sesuai kebutuhan
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role']
        ]);

        Auth::login($user);

        // Redirect sesuai role
        switch ($user->role) {
            case 'admin':
                return redirect()->route('dashboard');
            case 'perusahaan':
                return redirect()->route('perusahaan.dashboard');
            case 'alumni':
                return redirect()->route('alumni.dashboard');
        }
    }
}